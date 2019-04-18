<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class ServerConfigController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
        $user = Auth::user();
        if (!$user->hasRole('sintechsadmin')) { // you can pass an id or slug
            return redirect('/');
        }
    }
    
    public function dns(){
        return view("sintechs.server_dns");
    }
    
    public function crontab(){
        return view("sintechs.server_crontab");
    }
    
    public function disk_usage(){
        return view("sintechs.server_disk_usage");
    }
    
    public function log_rest_api(){
        return view("sintechs.server_log_rest_api");
    }
    
    public function log_web_app(){
        return view("sintechs.server_log_web_app");
    }
    
    public function log_serial_comm(){
        return view("sintechs.server_log_serial_comm");
    }
    
    public function log_rotate(){
        return view("sintechs.server_log_rotate");
    }
    
    
}