<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\SintechsModules;


class ModulesController extends Controller {
    
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
    
    public function modules_type_list(){
        $mods = SintechsModules::all();
        return view("sintechs.modules_type_list", array('modules' => $mods ));
    }
    
    public function modules_type_form(){
        return view("sintechs.modules_type_form");
    }
    
    public function modules_type(){
        return view("sintechs.modules_type");
    }
    
    public function modules(){
        return view("sintechs.modules_mod");
    }
    
    public function sensors(){
        return view("sintechs.modules_sensors");
    }
    
    public function actuators(){
        return view("sintechs.modules_actuators");
    }
    
    
}