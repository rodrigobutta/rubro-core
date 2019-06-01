<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulation extends Model{

    protected $table = 'simulation';
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'simulation_x_user', 'simulation_id', 'user_id')->withPivot('is_primary')->orderBy('is_primary','desc');
    }

    public function areas(){
        return $this->belongsToMany(Area::class, 'simulation_x_area', 'simulation_id', 'area_id')->withPivot('scenario_id','sort')->orderBy('sort','asc');
    }

    public function companysizes(){
        return $this->belongsToMany(CompanySize::class, 'simulation_x_company_size', 'simulation_id', 'company_size_id')->withPivot('sort')->orderBy('sort','asc');
    }

    public function business(){
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function zone(){
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function family(){
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function base(){
        return $this->belongsTo(Base::class, 'base_id');
    }

    public function segment(){
        return $this->belongsTo(Segment::class, 'segment_id');
    }


    public function values(){
        return $this->hasMany(SimulationValue::class, 'simulation_id');
    }

    // busco un valor particular de la grilla, si alguno de los ejex de la magtrix viene en null, devuelvo array con todos
    public function getValue($areaId,$companySizeId, $segmentId = null){

        if(!$segmentId){
            $segmentId = $this->segment_id;
        }

        $res = $this->values()->where('company_size_id', $companySizeId)->where('area_id', $areaId)->where('segment_id', $segmentId)->first();
        if($res){
            $res = $res->value;
        }


        return $res;
    }


    // FUNCIONES DE CALCULO DE RESULTADOS

    public function getResultClientCount($areaId, $companySizeId, $segmentId = null){

        if(!$segmentId){
            $segmentId = $this->segment_id;
        }

        $universo_table_id = $this->getTableId(getUniversoTable($segmentId)->code);

        $res = $this->getValue($areaId,$companySizeId,$segmentId) / 100 * $this->base->getValue($areaId,$companySizeId,$universo_table_id);

        // if($res> 4){
        //     $res = $res * (-1);
        // }



        return $res;
    }


    public function getResultClientCountTotalBySegment($areaId, $companySizeId, $segmentId=null){

        if(!$segmentId){
            $segmentId = $this->segment_id;
        }

        $res = 0;

        if($areaId == '*' && $companySizeId == '*'){
            
            foreach ($this->areas as $key => $a) {
                foreach ($this->companysizes as $key => $c) {
                    $res += $this->getResultClientCount($a->id,$c->id,$segmentId);                    
                }                
            }
            
        }
        else if($areaId == '*'){
            
            foreach ($this->areas as $key => $a) {
                $res += $this->getResultClientCount($a->id,$companySizeId,$segmentId);                                
            }
            
        }
        else if($companySizeId == '*'){
            
            foreach ($this->companysizes as $key => $c) {
                $res += $this->getResultClientCount($areaId,$c->id,$segmentId);
                
            }                
        
        }


        
        // $cota = $this->base->getValue($areaId,$companySizeId,$universo_table_id);



        return $res;
    }

    
    public function getResultClientCountTotal($areaId, $companySizeId){

        $res = 0;

        foreach (Segment::all() as $s) {
            $res += $this->getResultClientCountTotalBySegment($areaId, $companySizeId, $s->id);
        }
        
        return $res;
    }


    public function getResultBilling($areaId, $companySizeId, $segmentId = null){

        if(!$segmentId){
            $segmentId = $this->segment_id;
        }

        $currentArea = $this->areas()->where('area_id',$areaId)->first();

        $scenario = Scenario::find($currentArea->pivot->scenario_id);
        
        // codigos 0_0_0_0_0
        $universo_table_id = $this->getTableId(getUniversoTable($segmentId)->code);
        
        // cuando las tablas se sacaban del excel de universo
        // $mad_facturacion_table_id = $this->getTableId(getMadTable($segmentId)->code);
        // $mediana_facturacion_table_id = $this->getTableId(getMedianaTable($segmentId)->code);
        
        $mad_facturacion_table_id = $this->getTableId('mad_general');
        $mediana_facturacion_table_id = $this->getTableId('mediana_general');
        

        $res =  $this->getValue($areaId,$companySizeId,$segmentId ) / 100 * $this->base->getValue($areaId,$companySizeId,$universo_table_id) * ( $this->base->getValue($areaId,$companySizeId,$mediana_facturacion_table_id) + $this->base->getValue($areaId,$companySizeId,$mad_facturacion_table_id) * $scenario->factor );
        
        if($res == -0){
            $res = 0;
        }

        return $res;
    }


    // calcula el billing para un semento dado (si null agarra el actual de la sim) y tiene wildcards para setear o no un area o company size, caso contrario sumariza todo
    public function getResultBillingTotalBySegment($areaId, $companySizeId, $segmentId=null){

        if(!$segmentId){
            $segmentId = $this->segment_id;
        }

        $res = 0;

        if($areaId == '*' && $companySizeId == '*'){
           
            foreach ($this->areas as $key => $a) {
                foreach ($this->companysizes as $key => $c) {
                    $res += $this->getResultBilling($a->id,$c->id,$segmentId);                    
                }                
            }
            
        }
        else if($areaId == '*'){
            
            foreach ($this->areas as $key => $a) {
                $res += $this->getResultBilling($a->id,$companySizeId,$segmentId);
            }
            
        }
        else if($companySizeId == '*'){
            
            foreach ($this->companysizes as $key => $c) {
                $res += $this->getResultBilling($areaId,$c->id,$segmentId);                
            }                
        
        }

        return $res;
    }


    // calcula el total de billing para todos los segmentos de la simulación
    public function getResultBillingTotal($areaId, $companySizeId){

        $res = 0;

        foreach (Segment::all() as $s) {
            $res += $this->getResultBillingTotalBySegment($areaId, $companySizeId, $s->id);
        }
        
        return $res;
    }



    // FIN FUNCIONES

    
    // obtengo el id concatenado 0_0_0_0 en base a la configuracion de la simulacion y el codigo del source que quiero tener por ej clientes_ultimos_5_anos
    public function getTableId($source_code){

        $sourceId = getSourceId($source_code);

        $zoneId = $this->zone_id;
        if($source_code=='mad_general' || $source_code=='mediana_general'){
            $zoneId = 0;
        }

        return getTableIdField($this->base->id, $this->business_id, $zoneId, $this->family_id, $sourceId);

    }


    public function getBusiness(){
        if(isset($this->business)){
            return $this->business;
        }
        else{
            $dumb = new Business;
            $dumb->id = 0;
            $dumb->name = '';
            return $dumb;
        }
    }

    public function getZone(){
        if(isset($this->zone)){
            return $this->zone;
        }
        else{
            $dumb = new Zone;
            $dumb->id = 0;
            $dumb->name = '';
            return $dumb;
        }
    }
    

    public function getFamily(){
        if(isset($this->family)){
            return $this->family;
        }
        else{
            $dumb = new Family;
            $dumb->id = 0;
            $dumb->name = '';
            return $dumb;
        }
    }

    
    public function getBase(){
        if(isset($this->base)){
            return $this->base;
        }
        else{
            $dumb = new Base;
            $dumb->id = 0;
            $dumb->name = '';
            return $dumb;
        }
    }

    public function getSegment(){
        if(isset($this->segment)){
            return $this->segment;
        }
        else{
            $dumb = new Segment;
            $dumb->id = 0;
            $dumb->name = '';
            return $dumb;
        }
    }
    
    
    public function getCreatedDate(){
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
    }


    public function canEdit(){

        $me = \Auth::user();

        if($me->hasProfile('cross-simulation')){
            return true; // si el usuario tiene permiso cross o es god, puede editar
        } 

        return $this->users()->where('user_id',$me->id)->exists();
    }


}

