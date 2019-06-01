<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Auth;

use App\Alert;

class AlertController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add(Request $request)
    {  
        $item = new Alert;
        $item->id = 0;

        return view('admin.alert.edit',[
            'item'=>$item      
        ]);
    }


    public function list(Request $request)
    {

        $me = Auth::user();

        $query = Alert::orderBy('id', 'desc');
        
        if($request->input('q')) {
            $query->where('title', 'like' ,"%{$request->input('q')}%")->orWhere('description', 'like', "%{$request->input('q')}%");
        }
        
        $items = $query->paginate(10)->appends($request->input());

        return view('admin.alert.list',[
            'items'=>$items,
            'q' => $request->input('q', '')
        ]);
    }



    // Mostrar pantalla de perfil del usuario
    public function edit($id = 0, Request $request)
    {

        if($item = Alert::find($id)){

        }
        else{
            $item = Auth::user();
        }

        return view('admin.alert.edit',['item'=>$item]);
    }


    public function patch(Request $request)
    {

        $id = $request->get('id');


        $validator = Validator::make($request->all(), [            
            'title' => 'required|max:150',            
        ],[ 
            'title.required' => 'El nombre esta vacio vamoosss',
            'title.max' => 'El nombre no debe tener mas de 150 caracteres',
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }


        if($id==0){
            $item = new Alert;
        }
        else{
            $item = Alert::find($id);
        }

        $item->title = $request->get('title');
        $item->description = $request->get('description');
        $item->link = $request->get('link');
        $item->target = $request->get('target');
        // $item->from = $request->get('from');
        // $item->to = $request->get('to');
        $item->published = $request->get('published')=="1"?1:0;

        $item->save();

        
        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }


    

    public function delete($id = 0, Request $request)
    {

        if($item = Alert::find($id)){
            $item->delete();
        }
      
        return $this->list($request);
    }


}
