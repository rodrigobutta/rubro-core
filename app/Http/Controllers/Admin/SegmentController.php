<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Auth;

use App\Segment;

class SegmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add(Request $request)
    {  
        $item = new Segment;
        $item->id = 0;

        justForProfile('admin');

        return view('admin.segment.edit',[
            'item'=>$item
        ]);
    }


    public function list(Request $request)
    {

        $query = Segment::orderBy('id', 'desc');
        
        if($request->input('q')) {
            $query->where('name', 'like' ,"%{$request->input('q')}%");
        }
        
        $items = $query->paginate(10)->appends($request->input());

        justForProfile('admin');

        return view('admin.segment.list',[
            'items'=>$items,
            'q' => $request->input('q', '')
        ]);
    }


    public function edit($id, Request $request)
    {

        justForProfile('admin');

        $item = Segment::find($id);

        return view('admin.segment.edit',['item'=>$item]);
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
            $item = new Segment;    
        }
        else{
            $item = Segment::find($id);
        }


        $item->name = $request->get('name');

        $item->save();

        
        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }

    public function delete($id = 0, Request $request)
    {

        if($item = Segment::find($id)){
            $item->delete();
        }
      
        return $this->list($request);
    }



    public function search(Request $request)
    {
        $term = $request->input('term', '');

        $res = [];

        // if($term !== '') {
            $items = Segment::where('name', 'like', "%$term%")->take(20)->get();
            foreach($items as $key => $i) {
                $res[$key]['id'] = $i->id;
                $res[$key]['name'] = $i->name;                                
            }
        // }

        return json_encode($res);
    }
    
    public function getById(Request $request)
    {

        $id = $request->input('id', '0');

        if($i = Segment::find($id)){

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
