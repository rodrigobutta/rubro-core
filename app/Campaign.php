<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model{

    protected $table = 'campaigns';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'start_datetime',
        'end_datetime'
    ];

    public function getDurationAttribute() {
        if ($this->is_permanent) {
            return 'Permanente';
        } else {
            $start = date('d/m/Y H:i:s', strtotime($this->start_datetime));
            $end = date('d/m/Y H:i:s', strtotime($this->end_datetime));

            return "{$start} - {$end}";
        }
    }

}

