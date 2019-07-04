<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Member;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

use IlluminateHttpRequest;

use AppHttpRequests;
use AppHttpControllersController;



use Firebase\Auth\Token\Verifier;


class AuthController extends Controller
{

    private $guard;

    public function __construct()
    {
        $this->guard = Auth::guard('api');        
    }


    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:member',
            'password' => 'required|string|confirmed'
        ]);
        $user = new Member([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // dd($user->email);


        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        


        // $user = Member::where('email',$request->get('email'))->where('password',bcrypt($request->get('password')))->first();

        $user = Member::where('email',$request->get('email'))->first();

        if(!$user){
            return response()->json([
                'message' => 'Member Not Found'
            ], 401);
        }

        if(!password_verify($request->get('password'),$user->password)){
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        
        // $credentials = request(['email', 'password']);
        // if(!Auth::attempt($credentials)){
        // // if(!$this->guard->attempt($credentials)){

        //     return response()->json([
        //         'message' => 'Unauthorized'
        //     ], 401);

        // }
            

        // dd('ok!');



        // $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addYears(2);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);

    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated Member
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }



    public function firebaseLogin(Request $request)
    {


        

        $token = $request->get('token');
        $email = $request->get('email');
        $emailVerified = $request->get('emailVerified');
        $name = $request->get('name');        
        $phone = $request->get('phone');
        $photourl = $request->get('photourl');
        $provider = $request->get('provider');
        $uid = $request->get('uid');



        $firebase_project_id = env('FIREBASE_PROJECT_ID', 'project-111111');
        $verifier = new Verifier($firebase_project_id);
        try {
            $verifiedIdToken = $verifier->verifyIdToken($token);            
            $firebaseUid = $verifiedIdToken->getClaim('sub'); // "a-uid"


            $user = Member::where('firebase_uid',$firebaseUid)->first();

            if(!$user){
                
                
                $user = new Member([                    
                    'email' => $email,
                    'email_verified' => $emailVerified?1:0,
                    'name' => $name,
                    'phone' => $phone,
                    'photo_url' => $photourl,
                    'provider' => $provider,
                    'firebase_uid' => $firebaseUid
                ]);
        
                // dd($user->email);
        
        
                $user->save();


                // return response()->json([
                //     'message' => 'Member Not Found'
                // ], 401);


            }


            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addYears(2);
            $token->save();
    
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
                'user' => $user->jsonMainInfo()
            ]);



        } catch (\Firebase\Auth\Token\Exception\ExpiredToken $e) {
            echo $e->getMessage();
        } catch (\Firebase\Auth\Token\Exception\IssuedInTheFuture $e) {
            echo $e->getMessage();
        } catch (\Firebase\Auth\Token\Exception\InvalidToken $e) {
            echo $e->getMessage();
        }

        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        // if ($request->remember_me)
        //     $token->expires_at = Carbon::now()->addYears(2);
        // $token->save();

        // return response()->json([
        //     'access_token' => $tokenResult->accessToken,
        //     'token_type' => 'Bearer',
        //     'expires_at' => Carbon::parse(
        //         $tokenResult->token->expires_at
        //     )->toDateTimeString()
        // ]);

    }


}