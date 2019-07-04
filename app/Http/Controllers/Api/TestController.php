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


    public function backgroundPushNotification(Request $request){

        $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
            "instanceId" => "063823b2-17a8-4234-8ba8-92cd22f58b40",
            "secretKey" => "13B2056544C07FE9E2B18BE51205DB1173DE1426291B2255CAEF6ED8166E64A2",
        ));
        
        $publishResponse = $beamsClient->publishToInterests(
            array("hello"),
            array("fcm" => array("notification" => array(
            "title" => "Hello Back",
            "body" => "Hello, Background!",
            )),
        ));


        $response = new \stdClass();

        $statusCode = 200;

        $response->message = 'Background push notification sent..';

        $response->code = $statusCode;

        return response()->json($response, $statusCode);

    }





}