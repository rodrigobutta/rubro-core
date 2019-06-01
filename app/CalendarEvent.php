<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model{

    protected $table = 'calendar';
    
    protected $dates = [
        'created_at',
        'updated_at',
        'event_date'
    ];

}

