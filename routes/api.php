<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api')->group(function () {
    Route::post('storeSampling', "Sintechs\APIController@storeSampling");
    Route::post('storeRuleEvent', "Sintechs\APIController@storeRuleEvent");
    Route::get('testSockets', "Sintechs\APIController@testSockets");
    Route::get('getSampling/{id}', "Sintechs\APIController@getSampling");
    Route::get('getLastSensorEvent/{sensor_uuid}', "Sintechs\APIController@getLastSensorEvent");
});