<?php
namespace App\Http\Controllers;


class SettingsController extends Controller {
    
    public function actuators() {
        return view('settings.actuators');
    }
    
    public function resources() {
        return view('settings.sample_rate');
    }
    
}