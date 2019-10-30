<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerLog extends Model
{
    protected $table = 'vger_log';
    
    public function type() {
        return $this->hasMany('App\VgerType');
    }
    
    public function sensor() {
        return $this->hasMany('App\VgerSensors');
    }
    
    public function actuator() {
        return $this->hasMany('App\VgerActuators');
    }
    
    public function user() {
        return $this->hasMany('App\Users');
    }
    
    public function rule() {
        return $this->hasMany('App\VgerRules');
    }
    
    public function sampling() {
        return $this->hasMany('App\VgerSampling');
    }
}
