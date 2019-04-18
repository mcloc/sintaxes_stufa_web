<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


class CommunicationController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
        $user = Auth::user();
        if (!$user->hasRole('sintechsadmin')) { // you can pass an id or slug
            return redirect('/');
        }
    }
    
    public function messagesQueue(){
        return view("sintechs.communication_messages_queue");
    }
    
    public function command(){
        return view("sintechs.communication_commands");
    }
    
    public function realtime(){
        return view("sintechs.communication_realtime");
    }
    
}