<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SimulationValue extends Model{

    protected $table = 'simulation_value';
    
    public $timestamps = false;

    public function area(){
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function companysize(){
        return $this->belongsTo(CompanySize::class, 'company_size_id');
    }
    
    public function segment(){
        return $this->belongsTo(Segment::class, 'segment_id');
    }

}

