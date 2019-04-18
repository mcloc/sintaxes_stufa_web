<?php
namespace App\Http\Controllers;

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
    
    
}