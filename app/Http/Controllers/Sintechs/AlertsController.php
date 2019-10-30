<?php
namespace App\Http\Controllers\Vger;

use App\VgerAlerts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AlertsController extends Controller {
    
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
    
    public function markAsReaded($id){
        $alert = VgerAlerts::find($id);
        $alert->readed = true;
        $alert->save();
        
        $alerts_count = VgerAlerts::hasAlert();
        
        return response($alerts_count, 200)->header('Content-Type', 'text/plain');
    }
    
    public function types(){
        return view("vger.alerts_type");
    }
    
    public function config(){
        return view("vger.alerts_config");
    }
    
    
}