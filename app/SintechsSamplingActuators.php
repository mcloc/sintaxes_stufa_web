<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSamplingActuators extends Model
{
    protected $table = 'sintechs_sampling_actuators';
    
    public function actuators() {
        return $this->hasMany('App\SintechsActuators');
    }
}
