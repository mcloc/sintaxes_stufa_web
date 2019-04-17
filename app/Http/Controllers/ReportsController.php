<?php
namespace App\Http\Controllers;


class ReportsController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function humidity_temperature() {
        return view('reports.humidity_temperature');
    }
    
    public function actuators() {
        return view('reports.actuators');
    }
    
    public function resources() {
        return view('reports.resources');
    }
    
}