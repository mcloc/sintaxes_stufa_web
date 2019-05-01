<?php
namespace App\Http\Controllers;

use App\SintechsSampling;


class ReportsController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function humidity_temperature() {
        $samps = SintechsSampling::getLast100Sampling();
        
        return view("reports.humidity_temperature", array('samps' =>$samps));
    }
    
    public function actuators() {
        return view('reports.actuators');
    }
    
    public function resources() {
        return view('reports.resources');
    }
    
}