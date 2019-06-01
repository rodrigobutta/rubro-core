<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

use Auth;

use Illuminate\Support\Facades\Storage;

use Exception;
use DB;

use App\Base;
use App\BaseValue;
use App\Family;
use App\Business;
use App\Zone;
use App\Area;
use App\Scenario;
use App\CompanySize;
use App\Source;

class BaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function add(Request $request)
    {  
        $item = new Base;
        $item->id = 0;

        return view('admin.base.edit',[
            'item'=>$item      
        ]);
    }


    public function list(Request $request)
    {

        $me = Auth::user();

        $query = Base::orderBy('id', 'desc');
        
        if($request->input('q')) {
            $query->where('title', 'like' ,"%{$request->input('q')}%")->orWhere('description', 'like', "%{$request->input('q')}%");
        }
        
        $items = $query->paginate(10)->appends($request->input());

        justForProfile('admin');

        return view('admin.base.list',[
            'items'=>$items,
            'q' => $request->input('q', '')
        ]);
    }



    public function edit($id = 0, Request $request)
    {

        $item = Base::find($id);

        return view('admin.base.edit',[
            'item'=>$item
        ]);
    }


    public function patch(Request $request)
    {

        $id = $request->get('id');


        $validator = Validator::make($request->all(), [            
            'name' => 'required|max:150',            
        ],[ 
            'name.required' => 'El nombre esta vacio',
            'name.max' => 'El nombre no debe tener mas de 150 caracteres',
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
            $item = new Base;
        }
        else{
            $item = Base::find($id);
        }

        $item->name = $request->get('name');        
        $item->sidenotes = $request->get('sidenotes');       
        $item->active = $request->get('active')=="1"?1:0;

        $item->save();

        

        $rsp = [
            'status' => 'success',
            'id' => $item->id
        ];
        return response()->json($rsp);


    }


    public function data($id, Request $request)
    {
        
        $item = Base::find($id);


        $report = DB::table('base_value')
        ->select(   'business.name as business_name',
                    'family.name as family_name',
                    'zone.name as zone_name',
                    'source.name  as source_name',
                    'business_id',
                    'zone_id',
                    'family_id',
                    'source_id',
                    'table_id',
                    DB::raw('count(*) as total')
        )
        ->join('business', 'business.id', '=', 'business_id')
        ->join('zone', 'zone.id', '=', 'zone_id')
        ->join('family', 'family.id', '=', 'family_id')
        ->join('source', 'source.id', '=', 'source_id')
        ->where('base_id', '=', $item->id);


        if(!$request->has('filter_notempty')){
            $filter_notempty = 1;
        }
        else{
            $filter_notempty = $request->get('filter_notempty')=="1"?1:0;
        }
        
        if($filter_notempty == 1){
            $report = $report->whereNotNull('value');
        }
        
        if($request->has('filter_zone_id') && $request->get('filter_zone_id') != ''){
            $filter_zone_id = $request->get('filter_zone_id');
            $report = $report->where('zone_id', '=', $filter_zone_id);
        }
        else{
            $filter_zone_id = null;
        }

        if($filter_family_id = $request->get('filter_family_id')){
            $report = $report->where('family_id', '=', $filter_family_id);
        }

        if($filter_business_id = $request->get('filter_business_id')){
            $report = $report->where('business_id', '=', $filter_business_id);
        }

        if($filter_source_id = $request->get('filter_source_id')){
            $report = $report->where('source_id', '=', $filter_source_id);
        }

        $report = $report->groupBy('business_id', 'family_id', 'zone_id', 'source_id', 'business.name', 'family.name', 'zone.name', 'source.name', 'table_id');        
        $report = $report->get();


        return view('admin.base.data',[
            'item'=>$item,
            'report'=>$report,
            'filter_zone_id'=>$filter_zone_id,
            'filter_family_id'=>$filter_family_id,
            'filter_business_id'=>$filter_business_id,
            'filter_source_id'=>$filter_source_id,
            'filter_notempty'=>$filter_notempty            
        ]);

    }


    public function importExcelUniverso($id, Request $request)
    {

        $validator = Validator::make($request->all(), [            
            'attach' => 'required',            
        ],[ 
            'attach.required' => 'Debe seleccionar un archivo excel'            
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }

        $item = Base::find($id);

        $item->attach = $request->get('attach');       

        $item->save();


        $sources = Source::whereActive(1)->get();


        try {
            if(!Storage::exists($item->attach)) {
                throw new Exception("No sé encontró el archivo $file");
            }
            

            // BaseValue::where('base_id',$item->id)->delete();
            BaseValue::where('base_id',$item->id)->where('zone_id','>', 0)->delete();


            $file = Storage::path($item->attach);                 
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file);
            $reader->setReadDataOnly(true);
            $objPHPExcel = $reader->load($file);

            // cada hoja es un cluster (combineta zona, accion, familia)
            foreach ($objPHPExcel->getAllSheets() as $sheetkey => $sheet) {
            
                $title = rtrim(ltrim($sheet->getTitle()));

                $cluster = explode('_',$title);

                $business = Business::where('alias', 'like', '%#'. $cluster[0] .'#%')->first();
                if(!$business){
                    continue;
                }

                $zone = Zone::where('alias', 'like', '%#'. $cluster[1] .'#%')->first();
                if(!$zone){
                    continue;
                }

                $family = Family::where('alias', 'like', '%#'. $cluster[2] .'#%')->first();
                if(!$family){
                    continue;
                }


                $cells = $sheet->toArray();

                foreach ($sources as $key => $source) {
                    

                    // BaseValue::where('base_id',$item->id)->where('source_id',$source->id)->delete();



                    $areas = [];
                    $row = $source->from_row;                    
                    $keep = true;
                    while($keep){
                        
                        if(!isset($cells[$row][$source->from_col-1]) ){
                            $keep=false;
                            continue;
                        }
                        $value = $cells[$row][$source->from_col-1];

                        $area = Area::where('alias', 'like', '%#'. $value .'#%')->first();
                        if(!$area){
                            $keep=false;
                        }
                        else{
                            array_push($areas, $area->id);
                            $row++;
                        }

                    }

                    $sizes = [];
                    $col = $source->from_col;                    
                    $keep = true;
                    while($keep){
                    
                        if(!isset($cells[$source->from_row-1][$col]) ){
                            $keep=false;
                            continue;
                        }                        
                        $value = $cells[$source->from_row-1][$col];

                        $size = CompanySize::where('alias', 'like', '%#'. $value .'#%')->first();
                        if(!$size){
                            $keep=false;
                        }
                        else{
                            array_push($sizes, $size->id);
                            $col++;
                        }

                    }

                    for ($row=0; $row < sizeof($areas); $row++) {                     
                        for ($col=0; $col < sizeof($sizes); $col++) { 
                        
                            $sheet_row = $source->from_row+$row;
                            $sheet_col = $source->from_col+$col;

                            $value =  $cells[$sheet_row][$sheet_col];

                            $table_id = getTableIdField($item->id,$business->id,$zone->id,$family->id,$source->id);

                            $val = [
                                'base_id' => $item->id, 
                                'business_id' => $business->id, 
                                'zone_id' => $zone->id, 
                                'family_id' => $family->id, 
                                'source_id' => $source->id,  
                                'area_id' => $areas[$row],  
                                'company_size_id' => $sizes[$col], 
                                'table_id' => $table_id,  
                                'row' => $sheet_row,  
                                'col' => $sheet_col, 
                                'value' => $value
                            ];
                            \DB::table('base_value')->insert($val);
                        
                        }
                    }


                }

            }


        } catch (Exception $e) {
            throw $e;
        }

        // return redirect()->route('admin.base.data', ['id' => $item->id])->with('success', 'Base Importada');

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }





    public function importExcelMad($id, Request $request)
    {

        $validator = Validator::make($request->all(), [            
            'attach' => 'required',            
        ],[ 
            'attach.required' => 'Debe seleccionar un archivo excel'            
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }

        $item = Base::find($id);

        $item->attach_mad = $request->get('attach');       

        $item->save();


        $source = Source::whereCode('mad_general')->first();


        try {
            if(!Storage::exists($item->attach_mad)) {
                throw new Exception("No sé encontró el archivo $file");
            }

            BaseValue::where('base_id',$item->id)->where('source_id',$source->id)->delete();


            $file = Storage::path($item->attach_mad);                 
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file);
            $reader->setReadDataOnly(true);
            $objPHPExcel = $reader->load($file);

            // cada hoja es unA accion
            foreach ($objPHPExcel->getAllSheets() as $sheetkey => $sheet) {
            
                $title = rtrim(ltrim($sheet->getTitle()));

                $business = Business::where('alias', 'like', '%#'. $title .'#%')->first();
                if(!$business){
                    continue;
                }

                $cells = $sheet->toArray();

                
                $row = 2;
                $keep = true;
                while($keep){
                    $row++;

                    if(!isset($cells[$row][1]) ){
                        $keep=false;
                        continue;
                    }                        
                    
                    $area = Area::where('alias', 'like', '%#'. $cells[$row][0] .'#%')->first();
                    if(!$area){
                        $keep=false;
                        continue;                        
                    }
                    
                    $family = Family::where('alias', 'like', '%#'. $cells[$row][1] .'#%')->first();
                    if(!$family){
                        $keep=false;
                        continue;
                    }
                
                    for ($col=2; $col < 8; $col++) { 
                    
                        $value =  $cells[$row][$col];

                        $table_id = getTableIdField($item->id,$business->id,0,$family->id,$source->id);

                        $val = [
                            'base_id' => $item->id, 
                            'business_id' => $business->id, 
                            'zone_id' => 0, // 0 es porque aplica a cualquier zona
                            'family_id' => $family->id, 
                            'source_id' => $source->id,  
                            'area_id' => $area->id,  
                            'company_size_id' => $col-1,  /// ojo que juega con el index y es casi harcoded
                            'table_id' => $table_id,  
                            'row' => 0,  
                            'col' => 0, 
                            'value' => $value
                        ];
                        \DB::table('base_value')->insert($val);
                    
                    }


                }



            }


        } catch (Exception $e) {
            throw $e;
        }

        

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }



    

    public function importExcelMediana($id, Request $request)
    {

        $validator = Validator::make($request->all(), [            
            'attach' => 'required',            
        ],[ 
            'attach.required' => 'Debe seleccionar un archivo excel'            
        ]);
        if ($validator->fails()) {
            $validations = $validator->errors()->getMessages();
            $rsp = [
                'status' => 'with-validations',
                'validations' => $validations
            ];
            return response($rsp, 403);
        }

        $item = Base::find($id);

        $item->attach_mediana = $request->get('attach');       

        $item->save();


        $source = Source::whereCode('mediana_general')->first();


        try {
            if(!Storage::exists($item->attach_mediana)) {
                throw new Exception("No sé encontró el archivo $file");
            }

            BaseValue::where('base_id',$item->id)->where('source_id',$source->id)->delete();


            $file = Storage::path($item->attach_mediana);                 
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file);
            $reader->setReadDataOnly(true);
            $objPHPExcel = $reader->load($file);

            // cada hoja es unA accion
            foreach ($objPHPExcel->getAllSheets() as $sheetkey => $sheet) {
            
                $title = rtrim(ltrim($sheet->getTitle()));

                $business = Business::where('alias', 'like', '%#'. $title .'#%')->first();
                if(!$business){
                    continue;
                }

                $cells = $sheet->toArray();

                
                $row = 2;
                $keep = true;
                while($keep){
                    $row++;

                    if(!isset($cells[$row][1]) ){
                        $keep=false;
                        continue;
                    }                        
                    
                    $area = Area::where('alias', 'like', '%#'. $cells[$row][0] .'#%')->first();
                    if(!$area){
                        $keep=false;
                        continue;                        
                    }
                    

                    $family = Family::where('alias', 'like', '%#'. $cells[$row][1] .'#%')->first();
                    if(!$family){
                        $keep=false;
                        continue;
                    }
                

                    for ($col=2; $col < 8; $col++) { 
                    
                        $value =  round($cells[$row][$col]); // pidieron redondear todo numero que entre (para que no haya decimales)

                        $table_id = getTableIdField($item->id,$business->id,0,$family->id,$source->id);

                        $val = [
                            'base_id' => $item->id, 
                            'business_id' => $business->id, 
                            'zone_id' => 0, // 0 es porque aplica a cualquier zona
                            'family_id' => $family->id, 
                            'source_id' => $source->id,  
                            'area_id' => $area->id,  
                            'company_size_id' => $col-1,  /// ojo que juega con el index y es casi harcoded
                            'table_id' => $table_id,  
                            'row' => 0,  
                            'col' => 0, 
                            'value' => $value
                        ];
                        \DB::table('base_value')->insert($val);
                    
                    }


                }



            }


        } catch (Exception $e) {
            throw $e;
        }

        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);


    }





    public function table($id, $tableId, Request $request)
    {

        $item = Base::find($id);

        $values = BaseValue::where('table_id',$tableId)->get();
      
        $matrix = getTableMatrix($tableId);

        $table = getTableProperties($tableId);

        $sizes = CompanySize::all();
        $areas = Area::all();

        return view('admin.base.table',[
            'item'=>$item,
            'table'=>$table,
            'sizes'=>$sizes,
            'areas'=>$areas,
            'values'=>$values,
            'matrix'=>$matrix
        ]);
    }

    
    public function tablePatch($id, $tableId, Request $request)
    {

        $item = Base::find($id);

        $values = $request->get('value');

        $arr_values = [];
        foreach($values as $areaId => $v){            
            foreach($v as $sizeId => $value){ 

                $fields = [];
                $fields['value'] = $value;
        
                BaseValue::where('table_id',$tableId)->where('area_id',$areaId)->where('company_size_id',$sizeId)->update($fields);

            }
        }
        
        $rsp = [
            'status' => 'success'
        ];
        return response()->json($rsp);

        
    }


    public function delete($id = 0, Request $request)
    {

        if($item = Base::find($id)){

            $item->values()->delete();
            $item->users()->detach();

            $item->delete();
        }
      
        return $this->list($request);
    }

    public function search(Request $request)
    {
        $term = $request->input('term', '');

        $res = [];

        // if($term !== '') {
            $items = Base::where('name', 'like', "%$term%")->take(20)->get();
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

        if($i = Base::find($id)){

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
