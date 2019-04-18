<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SamplingController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
        $user = Auth::user();
        if (!$user->hasRole('sintechsadmin')) { // you can pass an id or slug
            return redirect('/');
        }
    }
    
    public function sampling(){
        return view("sintechs.sampling");
    }
    
    
}