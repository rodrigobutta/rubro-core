<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Profile extends Model
{
    protected $table = 'profile';

    public function users(){
        return $this->belongsToMany(User::class, 'user_x_profile', 'profile_id', 'user_id');
    }


}
