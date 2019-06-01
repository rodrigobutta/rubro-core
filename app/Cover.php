<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model{

	protected $table = 'cover';

    public function folder(){
        return $this->belongsTo(Folder::class, 'folder_id');
    }


    public function getDate($format = 'l jS \\d\\e F Y'){

        if($this->date && $this->date != ''){
            return \Carbon\Carbon::createFromFormat('Y-m-d', $this->date)->format($format);
        }


    }


}

