<?php
namespace App\Http\Controllers\Vger;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller {
    
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
    
    public function client_data(){
        return view("vger.users_client_data");
    }
    
    public function user_roles(){
        return view("vger.users_roles");
    }
    
    public function user_permissions(){
        return view("vger.users_permissions");
    }
    
    public function create(){
        die('not implemented');
        return view("vger.users_permissions");
    }
    
    
    
}