<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LogsController extends Controller {
    
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
    
    public function audit(){
        return view("sintechs.logs_audit");
    }
    
    public function support(){
        return view("sintechs.logs_support");
    }
    
    public function errors(){
        return view("sintechs.logs_errors");
    }
    
    
}