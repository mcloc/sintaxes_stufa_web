<?php
namespace App\Http\Controllers\Vger;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LogsController extends Controller {
    
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
    
    public function audit(){
        return view("vger.logs_audit");
    }
    
    public function support(){
        return view("vger.logs_support");
    }
    
    public function errors(){
        return view("vger.logs_errors");
    }
    
    
}