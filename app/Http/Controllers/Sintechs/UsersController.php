<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
        $user = Auth::user();
        if (!$user->hasRole('sintechsadmin')) { // you can pass an id or slug
            return redirect('/');
        }
    }
    
    public function client_data(){
        return view("sintechs.users_client_data");
    }
    
    public function user_roles(){
        return view("sintechs.users_roles");
    }
    
    public function user_permissions(){
        return view("sintechs.users_permissions");
    }
    
    
    
}