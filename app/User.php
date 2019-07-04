<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    protected $table = 'user';

    // public $timestamps = false;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function config(){
        return $this->hasMany(UserConfig::class, 'user_id');
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class, 'user_x_profile', 'user_id', 'profile_id');
    }

    public function zones(){
        return $this->belongsToMany(Zone::class, 'user_x_zone', 'user_id', 'zone_id')->where('id','>',0);
    }

    public function business(){
        return $this->belongsToMany(Business::class, 'user_x_business', 'user_id', 'business_id');
    }

    public function families(){
        return $this->belongsToMany(Family::class, 'user_x_family', 'user_id', 'family_id');
    }


    public function contentClipboard(){
        return Content::where('clipboard_user_id',$this->id)->whereHolder('clipboard')->get();
    }

    public function getConfig($name,$expectsJson=false){

        if($res = $this->config()->select('value')->whereName($name)->first()){
            if($expectsJson){
                return json_decode($res->value);
            }
            else{
                return $res->value;
            }
        }
        else{
            if($expectsJson){
                return [];
            }
            else{
                return '';
            }
        }

    }

    public function isGod(){
        return $this->god==1;
    }

    public function commaProfiles($split = ', '){
        return $this->profiles->implode('name', $split);        
    }

    public function commaZones($split = ', '){
        return $this->zones->implode('name', $split);        
    }

    public function commaBusiness($split = ', '){
        return $this->business->implode('name', $split);        
    }

    public function commaFamilies($split = ', '){
        return $this->families->implode('name', $split);        
    }

    public function hasProfile($code = ''){
        if($this->isGod()) return true;
        return $this->profiles()->whereCode($code)->count();        
    }

    
    public function getFullnameAttribute(){
        return $this->name . ' ' .  $this->lastname;        
    }
    

}
