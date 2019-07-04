<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use IlluminateHttpRequest;
use AppHttpRequests;
use AppHttpControllersController;

use App\Member;
use App\Folder;


class FolderController extends Controller
{

    private $guard;

    public function __construct()
    {
        $this->guard = Auth::guard('api');        
    }


    public function list(Request $request){
        
        $response = new \stdClass();


        // try{

            $statusCode = 200;

            $parentId = $request->get('parentId',-1);
            $initial = Folder::where('parent_id',$parentId)->orderBy('sort')->get();

            $data = $this->recursiveFolders($initial);

            $response->data = $data;

        // }catch (Exception $e){
        //     $statusCode = 400;            
        //     $response->error = $e->getMessage();        
        // }finally{
            $response->code = $statusCode;
            return response()->json($response, $statusCode);
        // }


    }


    protected function recursiveFolders($items){
        $data = [];

        foreach($items as $i){
            
            $child = [
                'id' => $i->id,
                'name' => $i->name,
                'children' => $this->recursiveFolders($i->children)
            ];

            array_push($data, $child);
        }

        return $data;
    }


}