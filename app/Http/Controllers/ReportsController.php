<?php
namespace App\Http\Controllers;

use App\SintechsSampling;


class ReportsController extends Controller {
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function humidity_temperature() {
        $samps = SintechsSampling::getAllSampling();
        echo '<pre>';
        print_r($samps);
        die();
        
        return view("sintechs.sampling", array('samps',$samps));
        return view('reports.humidity_temperature');
    }
    
    public function actuators() {
        return view('reports.actuators');
    }
    
    public function resources() {
        return view('reports.resources');
    }
    
}