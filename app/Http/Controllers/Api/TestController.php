<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use IlluminateHttpRequest;
use AppHttpRequests;
use AppHttpControllersController;


use App\Events\TestEvent;

class TestController extends Controller
{

    private $guard;

    public function __construct()
    {
        $this->guard = Auth::guard('api');        
    }


    public function pushNotification(Request $request){
        
        $response = new \stdClass();

        $statusCode = 200;


        event(new TestEvent('hello world'));


        $response->message = 'Push notification sent..';

        $response->code = $statusCode;

        return response()->json($response, $statusCode);
    }

}