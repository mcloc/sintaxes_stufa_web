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
    Route::post('storeSampling', "Vger\APIController@storeSampling");
    Route::post('storeRuleEvent', "Vger\APIController@storeRuleEvent");
    Route::get('testSockets', "Vger\APIController@testSockets");
    Route::get('getSampling/{id}', "Vger\APIController@getSampling");
    Route::get('getLastSensorEvent/{sensor_uuid}', "Vger\APIController@getLastSensorEvent");
    Route::get('getModuleId/{module_name}', "Vger\APIController@getModuleId");
    Route::get('getActiveModules', "Vger\APIController@getActiveModules");
    Route::get('getSensorId/{sensor_uuid}', "Vger\APIController@getSensorId");
    Route::get('getSensorByUUID/{sensor_uuid}', "Vger\APIController@getSensorByUUID");
    Route::get('getActuatorByUUID/{actuator_uuid}', "Vger\APIController@getActuatorByUUID");
    Route::get('getMockModuleSampling/{module_name}', "Vger\APIController@getMockModuleSampling");
    
});