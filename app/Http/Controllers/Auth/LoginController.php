<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
//         echo '<pre>';
//         print_r($credentials);
//         die();
//         $credentials = bcrypt($credentials['password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        
        return redirect()->intended('/login');
    }
    
    public function showLoginForm(){
        return view('login');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->intended('/login');
    }
}
