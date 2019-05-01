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
    
    public function module()
    {
        return $this->hasMany(SintechsModules::class, 'id', 'module_id');
    }
    
    
    public static function getAllSampling(){
        $labels = array();
        $sampling_sensors = array();
        $sensors = array();
        $samplings = SintechsSampling::all()->sortByDesc('created_at');
        $samps = array();
        foreach($samplings as $key => $sp){
            $samp[$key]['sampling'] = $sp;
            $samp[$key]['module'] = $sp->module()->first();
            $samp[$key]['sampling_sensors'] = $sp->samplingSensors()->get();
            $samp[$key]['sampling_actuators'] = $sp->samplingActuators()->get();
            foreach($samp[$key]['sampling_sensors'] as $sensor_key => $sampling_sensor) {
                $samp[$key]['sensor'][$sensor_key]= $sampling_sensor->sensor()->first();
            }
            foreach($samp[$key]['sampling_actuators'] as $actuator_key => $sampling_actuator) {
                $samp[$key]['actuator'][$actuator_key]= $sampling_actuator->actuator()->first();
            }

        }
        return $samp;
    }
    
    public static function getLast100Sampling(){
        $labels = array();
        $sampling_sensors = array();
        $sensors = array();
        $samplings = SintechsSampling::get()->sortByDesc('created_at')->take(100);
        $samps = array();
        foreach($samplings as $key => $sp){
            $samp[$key]['sampling'] = $sp;
            $samp[$key]['module'] = $sp->module()->first();
            $samp[$key]['sampling_sensors'] = $sp->samplingSensors()->get();
            $samp[$key]['sampling_actuators'] = $sp->samplingActuators()->get();
            foreach($samp[$key]['sampling_sensors'] as $sensor_key => $sampling_sensor) {
                $samp[$key]['sensor'][$sensor_key]= $sampling_sensor->sensor()->first();
            }
            foreach($samp[$key]['sampling_actuators'] as $actuator_key => $sampling_actuator) {
                $samp[$key]['actuator'][$actuator_key]= $sampling_actuator->actuator()->first();
            }
            
        }
        return $samp;
    }
    
    
    public function getDates() {
        return array();
    }
}
