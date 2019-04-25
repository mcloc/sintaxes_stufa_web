<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSampling extends Model
{
    protected $table = 'sintechs_sampling';
    protected $guarded = [];
    
    
    public function samplingSensors()
    {
        return $this->hasMany(SintechsSamplingSensors::class, 'sampling_id', 'id');
    }
    
    public function samplingActuators()
    {
        return $this->hasMany(SintechsSamplingActuators::class, 'sampling_id', 'id');
    }
    
    
    public static function getAllSampling(){
        $labels = array();
        $sampling_sensors = array();
        $sensors = array();
        $samplings = SintechsSampling::all()->sortBy('created_at');
        $samps = array();
        foreach($samplings as $key => $sp){
//             $labels[] = $sp->created_at;
//             $sampling_sensors = SintechsSamplingSensors::where('sampling_id', $sp->id)->get()->sortBy('created_at');
//             foreach($sampling_sensors as $s){
//                 $sensors[$sp->created_at][$s->measure_type] = $s->value;
//             }
//             $sampling_actuators = SintechsSamplingActuators::where('sampling_id', $sp->id)->get()->sortBy('created_at');
//             foreach($sampling_actuators as $s){
//                 $sampling[$sp->created_at][$s->measure_type] = $s->value;
//             }


            $samp[$key]['sampling'] = $sp;
            $samp[$key]['sampling_sensors'] = $sp->samplingSensors()->get();
            $samp[$key]['sampling_actuators'] = $sp->samplingActuators()->get();
        }
        
        return $samp;
    }
    
    
    public function getDates() {
        return array();
    }
}
