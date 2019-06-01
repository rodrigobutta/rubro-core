<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model{

	protected $table = 'component';

    protected $casts = [
        'has_dynamics' => 'boolean',
    ];

    public function family(){
        return $this->belongsTo(ComponentFamily::class, 'component_family_id');
    }

    public function getIcon(){
        return '/images/components/'. $this->name .'.svg';
    }

}

