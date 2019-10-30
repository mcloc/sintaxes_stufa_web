<?php
namespace App\Http\Controllers;

use App\VgerSampling;


class ReportsController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function humidity_temperature() {
        $samps = VgerSampling::getLast100Sampling();
        
//         echo '<pre>';
//         print_r($samps);
//         die();
        
        return view("reports.humidity_temperature", array('samps' =>$samps));
    }
    
    public function actuators() {
        return view('reports.actuators');
    }
    
    public function resources() {
        return view('reports.resources');
    }
    
}