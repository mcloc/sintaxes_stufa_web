<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerSampling extends Model
{
    protected $table = 'vger_sampling';
    protected $guarded = [];
    
    public function rulesFired()
    {
        return $this->hasMany(VgerRulesFired::class, 'sampling_id', 'id');
    }
    
    public function samplingSensors()
    {
        return $this->hasMany(VgerSamplingSensors::class, 'sampling_id', 'id');
    }
    
    public function samplingActuators()
    {
        return $this->hasMany(VgerSamplingActuators::class, 'sampling_id', 'id');
    }
    
    public function module()
    {
        return $this->hasMany(VgerModules::class, 'id', 'module_id');
    }
    
    
    public static function getAllSampling(){
        $samplings = VgerSampling::all()->sortByDesc('created_at');
        $samp = array();
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
        $samplings = VgerSampling::orderByDesc('created_at')->limit(100)->get();
        $samp = array();
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
