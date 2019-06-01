<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use IlluminateHttpRequest;

use AppHttpRequests;
use AppHttpControllersController;

use Carbon\Carbon;
use App\Models\MyCarbon;

use App\Member;

use App\Http\Controllers\Controller;



class AuthenticateController extends Controller
{

    private $guard;

    public function __construct()
    {

        $this->guard = \Auth::guard('api');
    }

    public function index()
    {
        return response(['message' => 'Auth needed'],404);
    }



    public function loginWithGoogle(Request $request){

        $data = $request->get('data');

        // var_dump($data);
        // exit();

        $user = PeopleModel::where('username','=',$data['email'])->first();

        $user->refresh_token = str_random(100);

        $user->save();

        if ( ! $token = $this->guard->fromUser($user)) {
            return response(['message' => 'Invalid user.'],403);
        }

        return response([
            'message' => 'Login Successful',
            'user' => $user,
            'token' => $token,
            'refresh' => $user->refresh_token
        ]);


    }


    public function loginWithCredentials(Request $request){

        $user = $request->get('user');
        $password = $request->get('password');

        var_dump($user);
        exit();

        $user = PeopleModel::where('username','=',$user)->where('password','=',$password)->first();

        $user->refresh_token = str_random(100);

        $user->save();

        if ( ! $token = $this->guard->fromUser($user)) {
            return response(['message' => 'Invalid user.'],403);
        }

        return response([
            'message' => 'Login Successful',
            'user' => $user,
            'token' => $token,
            'refresh' => $user->refresh_token
        ]);


    }



    protected function tokenNegotiate(Request $request){


        $userId = $request->get('userId');
        $refreshToken = $request->get('refreshToken');


        if($user = PeopleModel::where('id','=',$userId)->where('refresh_token','=',$refreshToken)->first()){
            if ( ! $token = $this->guard->fromUser($user)) {
                return response(['message' => 'Token negotiation. Invalid user.'],403);
            }

            $user->refresh_token = str_random(100);
            $user->save();

            return response([
                'message' => 'Token refreshed',
                'token' => $token,
                'refresh' => $user->refresh_token
            ]);

        }
        else{
            return response(['message' => 'Token negotiation. Refresh token invalid.'],403);
        }

    }



}