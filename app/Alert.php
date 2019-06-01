<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model{

    protected $table = 'alert';
    
    protected $dates = [
        'created_at',
        'updated_at',
        // 'from',
        // 'to'
    ];


    public function getFrom($format = 'l jS \\d\\e F Y'){

        if($this->from && $this->from != ''){
            return \Carbon\Carbon::createFromFormat('Y-m-d', $this->from)->format($format);
        }
        else{
            return null;
        }

    }

    public function getTo($format = 'l jS \\d\\e F Y'){

        if($this->to && $this->to != ''){
            return \Carbon\Carbon::createFromFormat('Y-m-d', $this->to)->format($format);
        }
        else{
            return null;
        }

    }


    

}

