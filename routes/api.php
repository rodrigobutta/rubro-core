<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'namespace' => 'Api'
], function () {
    

        
    Route::group([
        'prefix' => 'auth',
    ], function () {
        
        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');

        Route::post('firebase/login', 'AuthController@firebaseLogin');
    
        
        Route::group([
        'middleware' => 'auth:api'
        ], function() {

            Route::get('logout', 'AuthController@logout');
            Route::get('user', 'AuthController@user');
        
        });

    });


        
    Route::group([
        // 'middleware' => 'auth:api',
        'prefix'    => 'folder',
    ], function() {

        Route::post('list', 'FolderController@list');
    
    });




        
    Route::group([
        'prefix'    => 'test',
    ], function() {

        Route::get('push-notification', 'TestController@pushNotification');
        Route::get('push-notification-background', 'TestController@backgroundPushNotification');
    
    });



});