<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use function Illuminate\Routing\Router\redirect;
use Illuminate\Support\Facades\Auth;


class ExpertSystemController extends Controller {
    
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
    
    public function rules(){
        return view("sintechs.expert_system_rules");
    }
    
    
}