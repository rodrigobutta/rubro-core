<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Support\Facades\Storage;

class Base extends Model{

    protected $table = 'base';
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'base_x_user', 'base_id', 'user_id')->withPivot('is_primary')->orderBy('is_primary','desc');
    }


    public function values(){
        return $this->hasMany(BaseValue::class, 'base_id');
    }

    public function getValue($areaId, $companySizeId, $tableId){

        $res = $this->values()            
            ->where('company_size_id', $companySizeId)
            ->where('area_id', $areaId)
            ->where('table_id', $tableId)
            ->first();
        
            if($res){
            $res = $res->value;
        }
        else{
            $res = -1;
        }
        return $res;
    }



    public function getSum($areaId, $companySizeId, $tableId){


        $rs = \DB::table('base_value')
                ->where('base_id', $this->id)
                ->where('table_id', $tableId);
      
        if($areaId != '*'){
            $rs = $rs->where('area_id', $areaId);            
        }
        else if($companySizeId != '*'){
            $rs = $rs->where('company_size_id', $companySizeId);
        }

        $res = $rs->sum('value');
        
        return $res;
    }

    
    public function getCreatedDate(){
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
    }

    public function isempty(){
        return  $this->values->isEmpty();
    }

    public function getUniversoExcelAttachUrl(){
        if($this->attach && $this->attach != ''){
            return Storage::url($this->attach);          ;
        }
        else{
            return null ;
        }
    }


    public function getUniversoExcelAttachName(){
        if($this->attach && $this->attach != ''){
            return basename($this->attach);
        }
        else{
            return null ;
        }
    }

    public function getMadExcelAttachName(){
        if($this->attach_mad && $this->attach_mad != ''){
            return basename($this->attach_mad);
        }
        else{
            return null ;
        }
    }

    public function getMedianaExcelAttachName(){
        if($this->attach_mediana && $this->attach_mediana != ''){
            return basename($this->attach_mediana);
        }
        else{
            return null ;
        }
    }




}

