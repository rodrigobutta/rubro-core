<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Auth;

use App\Simulation;
use App\Family;
use App\Area;
use App\Scenario;
use App\CompanySize;
use App\SimulationValue;
use App\Segment;
use App\Zone;
use App\Business;


class SimulationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add(Request $request)
    {  

        $me = Auth::user();


        $now = Carbon::now();

        $item = new Simulation;
        $item->user_id = $me->id;
        $item->name = 'Simulación de ' . $me->name . ' ' . $now->formatLocalized('%d %B %Y');                
        $item->active = 1;
        $item->segment_id = 1;        

        if(!$lastBase = getLastBase()){
            return redirect()->route('admin.simulation.list')->with('danger', 'No hay una base activa sobre la que realizar simulaciones.');
        }        
        $item->base_id = $lastBase->id;        
        
        if($me->hasProfile('cluster-free')){
            $item->zone_id = Zone::where('id','>',0)->first()->id;
            $item->business_id = Business::first()->id;
            $item->family_id = Family::first()->id;
        }
        else{

            if(!$me->zones()->exists() || !$me->business()->exists() || !$me->families()->exists()){
                return redirect()->route('admin.simulation.list')->with('danger', 'El usuario no tiene Clusters habilitados para poder hacer simulaciones.');
            }

            $item->zone_id = $me->zones()->first()->id;
            $item->business_id = $me->business()->first()->id;
            $item->family_id = $me->families()->first()->id;
        }

        $item->save();

        
        $allAreas = Area::all();
        foreach ($allAreas as $ix => $i) {
            $item->areas()->attach($i,['sort'=>$ix, 'scenario_id'=>2]);                      
        }

        $allCompanySizes = CompanySize::all();
        foreach ($allCompanySizes as $ix => $i) {
            $item->companysizes()->attach($i,['sort'=>$ix]);                      
        }

        $item->users()->sync($me->id);

        return redirect()->route('admin.simulation.play', ['id' => $item->id])->with('success', 'Simulación Creada');

    }


    public function list(Request $request)
    {

        $me = Auth::user();

        $query = Simulation::orderBy('id', 'desc');

        // Mostrar sólo simulaciones propias o para cross
        if(!$me->hasProfile('cross-simulation')){
            $query = $query->join('simulation_x_user', 'simulation.id', '=', 'simulation_id');
            $query = $query->where('simulation_x_user.user_id', $me->id);
        }

        
        if($request->input('q')) {
            $query->where('title', 'like' ,"%{$request->input('q')}%")->orWhere('description', 'like', "%{$request->input('q')}%");
        }
        
        $items = $query->paginate(10)->appends($request->input());

        return view('admin.simulation.list',[
            'items'=>$items,
            'me'=>$me,
            'q' => $request->input('q', '')
        ]);
    }



    public function edit($id = 0, Request $request)
    {
        $me = Auth::user();

        $item = Simulation::find($id);

        // if($me->hasProfile('cluster-free')){
            
        // }
        // else{
          
        // }

        $areas = Area::orderBy('name')->get();
        $companysizes = CompanySize::orderBy('name')->get();
        $scenarios = Scenario::get();
      

        return view('admin.simulation.edit',[
            'item'=>$item,
            'areas'=>$areas,
            'companysizes'=>$companysizes,
            'scenarios'=>$scenarios
        ]);
    }


    public function patch(Request $request)
    {

        $id = $request->get('id');

        $me = Auth::user();


        $validator = Validator::make($request->all(), [            
            'name' => 'required|max:150',            
            'base_id' => 'required',
            'zone_id' => 'required',
            'business_id' => 'required',
            'family_id' => 'required',
            'segment_id' => 'required'            
        ],[ 
            'name.required' => 'El nombre esta vacio',
            'name.max' => 'El nombre no debe tener mas de 150 caracteres',
            'base_id.required' => 'Debe especificar una base de donde tomar los datos.',
            'zone_id.required' => 'Debe especificar la zona de análisis.',
            'business_id.required' => 'Debe especificar el tipo de negocio a analizar.',
            'family_id.required' => 'Debe especificar la familia de productos a analizar.',
            'segment_id.required' => 'Debe especificar un Segmento.'
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
            $item = new Simulation;
            $item->user_id = $me->id;
        }
        else{
            $item = Simulation::find($id);
        }

        $item->name = $request->get('name');        
        $item->sidenotes = $request->get('sidenotes');
        $item->business_id = $request->get('business_id');                
        $item->zone_id = $request->get('zone_id');        
        $item->segment_id = $request->get('segment_id');        
        $item->family_id = $request->get('family_id');        
        $item->base_id = $request->get('base_id');        
        $item->active = $request->get('active')=="1"?1:0;

        $item->save();

        // if($id==0){
            $item->users()->sync($me->id);
        // }
        
        // AREAS
        $areas = $request->get('areas');
        $arr_areas = [];
        foreach($areas as $key => $ar){            
            if($key==0) continue; // para fixear componente propio repeater first null  
            $rel_id = $ar['area_id'];
            $arr_areas[$rel_id] = [];
            $arr_areas[$rel_id]['scenario_id'] = $ar['scenario_id'];
            $arr_areas[$rel_id]['sort'] = $ar['sort']; 
        }
        $item->areas()->sync($arr_areas);


        // COMPANY SIZE
        $companysizes = $request->get('companysizes');
        $arr_companysizes = [];
        foreach($companysizes as $key => $ar){     
            if($key==0) continue; // para fixear componente propio repeater first null  
            $rel_id = $ar['company_size_id'];
            $arr_companysizes[$rel_id] = [];
            $arr_companysizes[$rel_id]['sort'] = $ar['sort']; 
        }        
        $item->companysizes()->sync($arr_companysizes);


        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }


    

    public function delete($id = 0, Request $request)
    {

        if($item = Simulation::find($id)){

            $item->values()->delete();
            $item->users()->detach();
            $item->areas()->detach();
            $item->companysizes()->detach();
            $item->delete();
        }
      
        return $this->list($request);
    }

    public function search(Request $request)
    {
        $term = $request->input('term', '');

        $res = [];

        // if($term !== '') {
            $items = Simulation::where('name', 'like', "%$term%")->take(20)->get();
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

        if($i = Simulation::find($id)){

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





    public function play($id, Request $request)
    {
        $me = Auth::user();

        $item = Simulation::find($id);

        // son las areas seleccionadas, pero recorridas y se agrega el objecto Scenario obtenido desde el pivot, para no tener que buscarlo uno a la vez en base al id
        $itemAreas = $item->areas;
        foreach($itemAreas as &$ia){
            $ia->scenario = Scenario::find($ia->pivot->scenario_id);
        }

        $scenarios = Scenario::get();
        $segments = Segment::get();


        if($me->hasProfile('cluster-free')){
            $zones = Zone::where('id','>',0)->get();
            $business = Business::all();
            $families = Family::all();
        }
        else{
            $zones = $me->zones;
            $business = $me->business;
            $families = $me->families;
        }

        // Calculos para tabla totalizadora de segmentos

        $totalArray = [];
        $totalSumCantActual = 0;
        $totalSumCantResult = 0;
        $totalSumBillingResult = 0;
        foreach ($segments as $s){
            $totalArray[$s->id]['name'] = $s->name;

            $tmp = $item->base->getSum('*', '*', $item->getTableId(getUniversoTable($s->id)->code) );
            $totalSumCantActual += $tmp;
            $totalArray[$s->id]['SumCantActual'] = $tmp;

            $tmp = $item->getResultClientCountTotalBySegment('*','*', $s->id);
            $totalSumCantResult += $tmp;
            $totalArray[$s->id]['SumCantResult'] = $tmp;

            $tmp = $item->getResultBillingTotalBySegment('*','*', $s->id);
            $totalSumBillingResult += $tmp;
            $totalArray[$s->id]['SumBillingResult'] = $tmp;

        }

        $totalArray[0]['name'] = 'Total';
        $totalArray[0]['SumCantActual'] = $totalSumCantActual;
        $totalArray[0]['SumCantResult'] = $totalSumCantResult;
        $totalArray[0]['SumBillingResult'] = $totalSumBillingResult;            



        $cotaTableId = $item->getTableId(getCotaTable($item->segment_id)->code);


        return view('admin.simulation.play',[
            'item'=>$item,        
            'itemAreas'=>$itemAreas,
            'segments'=>$segments,
            'scenarios'=>$scenarios,
            'zones'=>$zones,
            'business'=>$business,
            'families'=>$families,
            'totalArray'=>$totalArray,
            'cotaTableId'=>$cotaTableId
        ]);
    }


    
    public function playSave(Request $request)
    {

        $id = $request->get('id');


        // $validator = Validator::make($request->all(), [            
        //     'name' => 'required|max:150',            
        // ],[ 
        //     'name.required' => 'El nombre esta vacio',
        //     'name.max' => 'El nombre no debe tener mas de 150 caracteres',
        // ]);
        // if ($validator->fails()) {
        //     $validations = $validator->errors()->getMessages();
        //     $rsp = [
        //         'status' => 'with-validations',
        //         'validations' => $validations
        //     ];
        //     return response($rsp, 403);
        // }


        $item = Simulation::find($id);

        
        $values = $request->get('value');

        $arr_values = [];
        foreach($values as $vix => $v){            
            foreach($v as $vvix => $vv){ 

                $i = [];
                $i['simulation_id'] = $item->id;
                $i['area_id'] = $vix;
                $i['company_size_id'] = $vvix;
                $i['segment_id'] = $item->segment_id;
                $i['value'] = $vv;
                
                if($vv){
                    array_push($arr_values,$i);
                }
    
            }
        }
        SimulationValue::where('simulation_id', $item->id)->where('segment_id',$item->segment_id)->delete(); 
        SimulationValue::insert($arr_values);

        
        // Actualizo los selects de escenario
        $scenarios = $request->get('scenarios');        
        foreach($scenarios as $areaId => $scenarioId){                 
            $item->areas()->updateExistingPivot($areaId, ['scenario_id'=>$scenarioId]);
        }


        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }




    
    public function clon($id, Request $request)
    {

        $item = Simulation::find($id);


        $copySuffix = ' copia ' . str_random();

        $me = Auth::user();

        $new = $item->replicate();
        $new->name = $item->name . $copySuffix;        
        $new->user_id = $me->id; // asigno usuario que esta haciendo la copia al nuevo folder
        $new->active = 0;
        $new->save();

    

        foreach($item->areas as $p){
            $new->areas()->attach($p->id,['scenario_id'=>$p->pivot->scenario_id]);
        }

        foreach($item->companysizes as $p){
            $new->companysizes()->attach($p->id);
        }

        foreach($item->users as $p){
            $new->users()->attach($p->id);
        }

        foreach ($item->values as $value) {
            $newValue = $value->replicate();
            $newValue->simulation_id = $new->id;
            $newValue->save();
        }
        
        return redirect()->route('admin.simulation.play', ['id' => $new->id])->with('success', 'Simulación Clonada');

      
    }



    

    public function playSet($id, Request $request)
    {
        
        $me = Auth::user();

        // $validator = Validator::make($request->all(), [            
        //     'segment_id' => 'required',            
        // ],[ 
        //     'segment_id.required' => 'El nuevo segmento es obligatorio',            
        // ]);
        // if ($validator->fails()) {
        //     $validations = $validator->errors()->getMessages();
        //     $rsp = [
        //         'status' => 'with-validations',
        //         'validations' => $validations
        //     ];
        //     return response($rsp, 403);
        // }


        $item = Simulation::find($id);

        
        if($request->has('segment_id')){
            $item->segment_id = $request->get('segment_id');        
        }
        if($request->has('family_id')){
            $item->family_id = $request->get('family_id');        
        }
        if($request->has('zone_id')){
            $item->zone_id = $request->get('zone_id');        
        }
        if($request->has('business_id')){
            $item->business_id = $request->get('business_id');        
        }
        
        
        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }



    

    public function playProperties($id, Request $request)
    {
        
        $me = Auth::user();

        $validator = Validator::make($request->all(), [            
            'name' => 'required',            
        ],[ 
            'name.required' => 'El nombre es obligatorio',            
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }


        $item = Simulation::find($id);

        $item->name = $request->get('name');
        $item->sidenotes = $request->get('sidenotes');
        
        
        $item->save();

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }



}
