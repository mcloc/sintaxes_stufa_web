<?php
namespace App\Http\Controllers\Sintechs;

use App\SintechsAlerts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AlertsController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if (!$user->hasRole('sintechsadmin')) { // you can pass an id or slug
                return redirect('/');
            }
            return $next($request);
        });
    }
    
    public function markAsReaded($id){
        $alert = SintechsAlerts::find($id);
        $alert->readed = true;
        $alert->save();
        
        $alerts_count = SintechsAlerts::hasAlert();
        
        return response($alerts_count, 200)->header('Content-Type', 'text/plain');
    }
    
    public function types(){
        return view("sintechs.alerts_type");
    }
    
    public function config(){
        return view("sintechs.alerts_config");
    }
    
    
}