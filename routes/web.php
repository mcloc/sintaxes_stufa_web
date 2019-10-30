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
    
    Route::post('/alerts/mark-as-readed/{id}', "Vger\AlertsController@markAsReaded");
});


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('reports')->group(function () {
        Route::get('humidity_temperature', "ReportsController@humidity_temperature");
        Route::get('actuators', "ReportsController@actuators");
        Route::get('resources', "ReportsController@resources");
    });
});

Route::group(['middleware' => ['role:vgeradmin']], function () {
    Route::prefix('users_admin')->group(function () {
        Route::get('client_data', "Vger\UsersController@client_data");
        Route::get('roles', "Vger\UsersController@user_roles");
        Route::get('permissions', "Vger\UsersController@user_permissions");
        Route::get('create', "Vger\UsersController@create");
    });
    
    Route::prefix('modules_admin')->group(function () {
        Route::get('modules_type', "Vger\ModulesController@modules_type");
        Route::get('modules_type_list', "Vger\ModulesController@modules_type_list");
        Route::get('modules_type_form', "Vger\ModulesController@modules_type_form");
        Route::post('modules_type_save', "Vger\ModulesController@modules_type_save");
        Route::get('modules', "Vger\ModulesController@modules");
        Route::get('sensors', "Vger\ModulesController@sensors");
        Route::get('actuators', "Vger\ModulesController@actuators");
    });
    
    Route::prefix('expert_system_admin')->group(function () {
        Route::get('rules', "Vger\ExpertSystemController@rules");
    });
    
    Route::prefix('sampling_admin')->group(function () {
        Route::get('sampling', "Vger\SamplingController@sampling");
    });
    
    Route::prefix('alerts_admin')->group(function () {
        Route::get('types', "Vger\AlertsController@types");
        Route::get('config', "Vger\AlertsController@config");
    });
    
    Route::prefix('logs_admin')->group(function () {
        Route::get('audit', "Vger\LogsController@audit");
        Route::get('support', "Vger\LogsController@support");
        Route::get('errors', "Vger\LogsController@errors");
    });
    
    Route::prefix('communications_admin')->group(function () {
        Route::get('messagesQueue', "Vger\CommunicationController@messagesQueue");
        Route::get('commandsQueue', "Vger\CommunicationController@CommandsQueue");
        Route::get('commands', "Vger\CommunicationController@commands");
        Route::get('commands_types', "Vger\CommunicationController@commands_types");
        Route::get('list_commands_types', "Vger\CommunicationController@list_commands_types");
        Route::get('form_commands_types', "Vger\CommunicationController@form_commands_types");
        Route::post('form_commands_types', "Vger\CommunicationController@save_commands_types");
        Route::get('commands_args', "Vger\CommunicationController@commands_args");
        Route::get('realtime', "Vger\CommunicationController@realtime");
    });
    
    Route::prefix('server_admin')->group(function () {
        Route::get('dns', "Vger\ServerConfigController@dns");
        Route::get('crontab', "Vger\ServerConfigController@crontab");
        Route::get('disk_usage', "Vger\ServerConfigController@disk_usage");
        Route::get('log_rest_api', "Vger\ServerConfigController@log_rest_api");
        Route::get('log_web_app', "Vger\ServerConfigController@log_web_app");
        Route::get('log_serial_comm', "Vger\ServerConfigController@log_serial_comm");
        Route::get('log_rotate', "Vger\ServerConfigController@log_rotate");
    });
});


