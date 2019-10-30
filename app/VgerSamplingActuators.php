<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerSamplingActuators extends Model
{
    protected $table = 'vger_sampling_actuators';
    
    public function actuator() {
        return $this->hasMany(VgerActuators::class, 'id', 'actuator_id');
    }
    
    public function sample(){
        return $this->belongsToMany(VgerSampling::class, 'id', 'sampling_id');
    }
    
    public function getDates() {
        return array();
    }
}
