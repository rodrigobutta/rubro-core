<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConfig extends Model
{
    protected $fillable = [
        'user_id', 'name', 'value'
    ];

    protected $table = 'user_config';

}
