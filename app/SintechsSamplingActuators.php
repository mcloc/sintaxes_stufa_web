<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSamplingActuators extends Model
{
    protected $table = 'sintechs_sampling_actuators';
    
    public function actuator() {
        return $this->hasMany('App\SintechsActuators','id', 'actuator_id');
    }
    
    public function sample(){
        return $this->belongsToMany(SintechsSampling::class, 'id', 'sampling_id');
    }
    
    public function getDates() {
        return array();
    }
}
