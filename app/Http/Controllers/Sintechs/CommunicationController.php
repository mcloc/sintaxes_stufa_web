<?php
namespace App\Http\Controllers\Vger;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CommunicationController extends Controller {
    
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
    
    public function messagesQueue(){
        return view("vger.communication_messages_queue");
    }
    
    public function commandsQueue(){
        return view("vger.communication_commands_queue");
    }
    
    public function commands_types(){
        return view("vger.communication_commands_types");
    }
    
    public function commands_args(){
        return view("vger.communication_commands_args");
    }
    
    public function commands(){
        return view("vger.communication_commands");
    }
    
    public function realtime(){
        return view("vger.communication_realtime");
    }
    
    public function list_commands_types(){
        return view("vger.communication_list_commands_types");
    }
    
    public function form_commands_types(){
        return view("vger.communication_commands_types_form");
    }
    
}