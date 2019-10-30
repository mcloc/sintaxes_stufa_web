<?php
namespace App\Http\Controllers\Vger;

use App\Http\Controllers\Controller;
use function Illuminate\Routing\Router\redirect;
use Illuminate\Support\Facades\Auth;


class ExpertSystemController extends Controller {
    
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
    
    public function rules(){
        return view("vger.expert_system_rules");
    }
    
    
}