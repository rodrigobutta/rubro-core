<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseValue extends Model{

    protected $table = 'base_value';
    
    public $timestamps = false;

    public function area(){
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function companysize(){
        return $this->belongsTo(CompanySize::class, 'company_size_id');
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
    

}

