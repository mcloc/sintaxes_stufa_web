<?php
namespace App\Http\Controllers\Sintechs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CommunicationController extends Controller {
    
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
    
    public function messagesQueue(){
        return view("sintechs.communication_messages_queue");
    }
    
    public function commands(){
        return view("sintechs.communication_commands");
    }
    
    public function realtime(){
        return view("sintechs.communication_realtime");
    }
    
}