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
        Route::get('client_data', "Sintechs\UsersController@client_data");
        Route::get('roles', "Sintechs\UsersController@user_roles");
        Route::get('permissions', "Sintechs\UsersController@user_permissions");
    });
    
    Route::prefix('modules_admin')->group(function () {
        Route::get('modules', "Sintechs\ModulesController@modules");
        Route::get('sensors', "Sintechs\ModulesController@sensors");
        Route::get('actuators', "Sintechs\ModulesController@actuators");
    });
    
    Route::prefix('expert_system_admin')->group(function () {
        Route::get('rules', "Sintechs\ExpertSystemController@rules");
    });
    
    Route::prefix('sampling_admin')->group(function () {
        Route::get('sampling', "Sintechs\SamplingController@sampling");
    });
    
    Route::prefix('alerts_admin')->group(function () {
        Route::get('types', "Sintechs\AlertsController@types");
        Route::get('config', "Sintechs\AlertsController@config");
    });
    
    Route::prefix('logs_admin')->group(function () {
        Route::get('audit', "Sintechs\LogsController@audit");
        Route::get('support', "Sintechs\LogsController@support");
        Route::get('errors', "Sintechs\LogsController@errors");
    });
    
    Route::prefix('communications_admin')->group(function () {
        Route::get('messagesQueue', "Sintechs\CommunicationController@messagesQueue");
        Route::get('commands', "Sintechs\CommunicationController@commands");
        Route::get('realtime', "Sintechs\CommunicationController@realtime");
    });
    
    Route::prefix('server_admin')->group(function () {
        Route::get('dns', "Sintechs\ServerConfigController@dns");
        Route::get('crontab', "Sintechs\ServerConfigController@crontab");
        Route::get('disk_usage', "Sintechs\ServerConfigController@disk_usage");
        Route::get('log_rest_api', "Sintechs\ServerConfigController@log_rest_api");
        Route::get('log_web_app', "Sintechs\ServerConfigController@log_web_app");
        Route::get('log_serial_comm', "Sintechs\ServerConfigController@log_serial_comm");
        Route::get('log_rotate', "Sintechs\ServerConfigController@log_rotate");
    });
});


