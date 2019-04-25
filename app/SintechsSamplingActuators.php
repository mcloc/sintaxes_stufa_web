<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSamplingActuators extends Model
{
    protected $table = 'sintechs_sampling_actuators';
    
    public function actuators() {
        return $this->hasMany('App\SintechsActuators');
    }
    
    public function sample(){
        return $this->belongsToMany(SintechsSampling::class, 'sampling_id');
    }
    
    public function getDates() {
        return array();
    }
}
