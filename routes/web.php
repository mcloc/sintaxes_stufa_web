<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/login', 'LoginController@login')->name('login');

Route::view('/', 'login');
Route::view('/dashboard', 'dashboard');
Route::view('/register', 'register');


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('reports')->group(function () {
        Route::get('humidity_temperature', "ReportsController@humidity_temperature");
        Route::get('actuators', "ReportsController@actuators");
        Route::get('resources', "ReportsController@resources");
    });
});

Route::group(['middleware' => ['role:sintechsadmin']], function () {
    Route::prefix('settings')->group(function () {
        Route::get('sensors', "SettingsController@sensors");
        Route::get('actuators', "SettingsController@actuators");
        Route::get('sample_rate', "SettingsController@sample_rate");
        Route::get('rules', "SettingsController@rules");
    });
});