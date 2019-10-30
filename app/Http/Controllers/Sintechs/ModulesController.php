<?php
namespace App\Http\Controllers\Vger;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\VgerModules;


class ModulesController extends Controller {
    
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
    
    public function modules_type_list(){
        $mods = VgerModules::all();
        return view("vger.modules_type_list", array('modules' => $mods ));
    }
    
    public function modules_type_form(){
        return view("vger.modules_type_form");
    }
    
    public function modules_type(){
        return view("vger.modules_type");
    }
    
    public function modules(){
        return view("vger.modules_mod");
    }
    
    public function sensors(){
        return view("vger.modules_sensors");
    }
    
    public function actuators(){
        return view("vger.modules_actuators");
    }
    
    
}