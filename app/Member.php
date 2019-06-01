<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use Carbon\Carbon;
use App\Models\MyCarbon;

use Illuminate\Database\Eloquent\SoftDeletes;

use RodrigoButta\Admin\Auth\Database\Administrator;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;


class Member extends Authenticatable
{

    // use Notifiable, HasPushSubscriptions;
    use Notifiable;

    use HasApiTokens;

    use SoftDeletes;


    protected $table = 'member';

    // protected $fillable = ['username', 'password', 'name', 'avatar'];


    protected $guarded = ['id'];

    


}
