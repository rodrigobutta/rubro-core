<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;

use App\Content;

class SearchController extends Controller
{
    public function index(Request $request) {
        $q = str_replace('\\u', '\\\\u', str_replace('"', '', json_encode($request->input('q'), JSON_HEX_APOS | JSON_HEX_QUOT)));
        
        $raw_results = [];
        $results = [];

        // primero tomo todos los contents de la DB que matcheen la query
        $query = Content::where('fields', 'like', "%$q%");
        //dd($query->toSql(), $query->getBindings());

        $db_hits = $query->get();

        foreach($db_hits as $hit) {
            // filtra publicados
            if($hit->real_folder !== null) {
                $folder = $hit->real_folder;
                // si ya tengo el folder en los resultados crudos, incremento hits
                if(isset($raw_results[$folder->id])) {
                    $raw_results[$folder->id]['hits']++;
                } else {
                    // si no lo tenia, creo un resultado nuevo
                    $raw_results[$folder->id] = array(
                        'folder' => $folder,
                        'hits' => 1
                    );
                }
            }
        }

        // ordena raw en base a los hits
        usort($raw_results, function($a, $b) { return $a['hits'] < $b['hits']; });

        // paso solo los folders al array result
        foreach($raw_results as $result) {
            $results[] = $result['folder'];
        }

        $paginated_results = $this->paginate($results)->withPath(route('search_results'))->appends($request->input());

        return view('results',['results' => $paginated_results, 'q' => $request->input('q')]);

    }

    private function paginate($items, $perPage = 50, $page = null, $options = []) {
        $page = $page ? : (Paginator::resolveCurrentPage() ? : 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
