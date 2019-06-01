<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Auth;

use App\Zone;

class ZoneController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add(Request $request)
    {  
        $item = new Zone;
        $item->id = 0;

        justForProfile('admin');

        return view('admin.zone.edit',[
            'item'=>$item
        ]);
    }


    public function list(Request $request)
    {

        $query = Zone::where('id','>',0)->orderBy('id', 'desc');
        
        if($request->input('q')) {
            $query->where('name', 'like' ,"%{$request->input('q')}%");
        }
        
        $items = $query->paginate(10)->appends($request->input());

        justForProfile('admin');

        return view('admin.zone.list',[
            'items'=>$items,
            'q' => $request->input('q', '')
        ]);
    }


    public function edit($id, Request $request)
    {

        justForProfile('admin');

        $item = Zone::find($id);

        return view('admin.zone.edit',['item'=>$item]);
    }


    public function patch(Request $request)
    {

        $id = $request->get('id');


        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200'
        ],[                 
            'name.required' => 'El nombre esta vacio',
            'name.max' => 'El nombre no debe tener mas de 200 caracteres'
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
            $item = new Zone;    
        }
        else{
            $item = Zone::find($id);
        }


        $item->name = $request->get('name');
        $item->alias = $request->get('alias');

        $item->save();

        
        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }

    public function delete($id = 0, Request $request)
    {

        if($item = Zone::find($id)){
            $item->delete();
        }
      
        return $this->list($request);
    }



    public function search(Request $request)
    {
        $term = $request->input('term', '');

        $res = [];

        $me = Auth::user();
        if($me->hasProfile('cluster-free')){
            $items = Zone::where('name', 'like', "%$term%")->take(20)->get();
        }
        else{
            $items = $me->zones()->where('name', 'like', "%$term%")->take(20)->get();
        }

        foreach($items as $key => $i) {
            $res[$key]['id'] = $i->id;
            $res[$key]['name'] = $i->name;                                
        }
    
        return json_encode($res);
    }
    
    public function getById(Request $request)
    {

        $id = $request->input('id', '0');

        if($i = Zone::find($id)){

            $res = new \stdClass();
            $res->id = $i->id;
            $res->name = $i->name;
            
            return json_encode($res);
        }
        else{
            $rsp = [
                'status' => 'not-found'                
            ];

            return response($rsp, 501);

        }
        
    }




}
