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
        
//         echo '<pre>';
//         print_r($samp);
//         die();
        
        return $samp;
    }
    
    
    public function getDates() {
        return array();
    }
}
