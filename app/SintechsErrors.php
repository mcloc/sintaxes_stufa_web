<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerErrors extends Model
{
    protected $table = 'vger_errors';
    
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
