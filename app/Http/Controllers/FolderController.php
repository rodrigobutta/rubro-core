<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Folder;
use App\Content;

class FolderController extends Controller
{

    // HACE DE DISPATCHER 

    public function viewFolder(Request $request, $url = null){

        if($folder = $this->getFolderByUrl($url)){
            return $this->getFolderView($request, $folder);
        }
        else{

            // $external = env('OLD_APP_URL','') . '/' . $url; // sufijo apendado a la url donde quedo el sitio anterior

            // $external_headers = @get_headers($external);
            // if(!$external_headers || $external_headers[0] == 'HTTP/1.1 404 Not Found') {
                abort(404);
            // }
            // else {                
                // return \Redirect::to($external);
            // }
            
        }

    }

    private function getFolderByUrl($url){

        if($folder = Folder::whereUrl($url)->first()){
            return $folder;
        }
        else{
            return false;
        }

    }

    public function getFolderView(Request $request, $item){

        return view('folder.view', [
            'action' => 'print',
            'item' => $item
        ]);

    }


    // PRINT SOLO DEL CONTENIDO DEL **FOLDER** PARA EMBEBER EN ALGUN LADO

    public function printFolder(Request $request, $url = null){

        if($folder = $this->getFolderByUrl($url)){
            return $this->getFolderPrint($request, $folder);
        }
        else{
            abort(404);
        }

    }

    public function getFolderPrint(Request $request, $item){

        return $item->html();

    }



    // METODO PRINT DEL **CONTENIDO** ALTERNATIVO PARA CUANDO NO ESTAMOS EN BLADE
    // view.folder.print usa algo parecido pero en instancia y dentro de blade
    public function printContent($id)
    {
        $item = Content::find($id);
        return $item->html();
    }

}
