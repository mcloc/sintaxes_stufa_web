<?php
namespace App\Http\Controllers\Vger;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ServerConfigController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if (!$user->hasRole('vgeradmin')) { // you can pass an id or slug
                return redirect('/');
            }
            return $next($request);
        });
    }
    
    public function dns(){
        return view("vger.server_dns");
    }
    
    public function crontab(){
        return view("vger.server_crontab");
    }
    
    public function disk_usage(){
        return view("vger.server_disk_usage");
    }
    
    public function log_rest_api(){
        return view("vger.server_log_rest_api");
    }
    
    public function log_web_app(){
        return view("vger.server_log_web_app");
    }
    
    public function log_serial_comm(){
        return view("vger.server_log_serial_comm");
    }
    
    public function log_rotate(){
        return view("vger.server_log_rotate");
    }
    
    
}