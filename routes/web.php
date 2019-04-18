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
Auth::routes(['register' => false]);
Route::any('/logout', 'Auth\LoginController@logout');
// Route::get('login', 'Auth\LoginController@showLoginForm');
// Route::get('/login', 'LoginController@login')->name('login');

// Route::view('/', 'login');
Route::view('/dashboard', 'dashboard');
Route::view('/register', 'register');

Route::redirect('/', "/dashboard");

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->group(function () {
    Route::get('/', "DashBoardController@home");
    });
});


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('reports')->group(function () {
        Route::get('humidity_temperature', "ReportsController@humidity_temperature");
        Route::get('actuators', "ReportsController@actuators");
        Route::get('resources', "ReportsController@resources");
    });
});

Route::group(['middleware' => ['role:sintechsadmin']], function () {
    Route::prefix('users_admin')->group(function () {
        Route::get('client_data', "UsersController@client_data");
        Route::get('user_roles', "UsersController@user_roles");
        Route::get('user_permissions', "UsersController@user_permissions");
    });
    
    Route::prefix('modules_admin')->group(function () {
        Route::get('modules', "ModulesController@modules");
        Route::get('sensors', "ModulesController@sensors");
        Route::get('actuators', "ModulesController@actuators");
    });
    
    Route::prefix('expert_system_admin')->group(function () {
        Route::get('rules', "ExpertSystemController@rules");
    });
    
    Route::prefix('sampling_admin')->group(function () {
        Route::get('sampling', "SamplingController@sampling");
    });
    
    Route::prefix('alerts_admin')->group(function () {
        Route::get('types', "AlertsController@types");
        Route::get('config', "AlertsController@config");
    });
    
    Route::prefix('logs_admin')->group(function () {
        Route::get('audit', "LogsController@audit");
        Route::get('support', "LogsController@support");
        Route::get('errors', "LogsController@errors");
    });
    
    Route::prefix('communications_admin')->group(function () {
        Route::get('messagesQueue', "CommunicationController@messagesQueue");
        Route::get('commands', "CommunicationController@commands");
        Route::get('realtime', "CommunicationController@realtime");
    });
    
    Route::prefix('server_admin')->group(function () {
        Route::get('dns', "ServerConfigController@dns");
        Route::get('crontab', "ServerConfigController@crontab");
        Route::get('disk_usage', "ServerConfigController@disk_usage");
        Route::get('log_rest_api', "ServerConfigController@log_rest_api");
        Route::get('log_web_app', "ServerConfigController@log_web_app");
        Route::get('log_serial_comm', "ServerConfigController@log_serial_comm");
        Route::get('log_rotate', "ServerConfigController@log_rotate");
    });
});


