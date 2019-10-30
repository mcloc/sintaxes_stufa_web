<?php

namespace App\Http\Controllers;


use App\VgerSampling;
use App\VgerSamplingSensors;

class DashBoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $labels = array();
        $sampling_sensors = array();
        $sensors = array();
        $samplings = VgerSampling::all()->sortBy('created_at');
        
        foreach($samplings as $sp){
            $labels[] = $sp->created_at;
            $sampling_sensors = VgerSamplingSensors::where('sampling_id', $sp->id)->get()->sortBy('created_at');
            foreach($sampling_sensors as $s){
                $sensors[$sp->created_at][$s->measure_type] = $s->value;
            }
        }
        
        return view('dashboard', array('labels' => $labels, 'sensors' => $sensors));
    }
}
