<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerConfig extends Model
{
    protected $table = 'vger_config';
    
    public function type() {
        return $this->hasMany('App\VgerType');
    }
    
    public function sensor() {
        return $this->hasMany('App\VgerSensors');
    }
    
    public function actuator() {
        return $this->hasMany('App\VgerActuators');
    }
    
    public function rule() {
        return $this->hasMany('App\VgerRules');
    }
}
