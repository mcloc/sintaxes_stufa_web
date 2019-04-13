<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsLog extends Model
{
    protected $table = 'sintechs_log';
    
    public function type() {
        return $this->hasMany('App\SintechsType');
    }
    
    public function sensor() {
        return $this->hasMany('App\SintechsSensors');
    }
    
    public function actuator() {
        return $this->hasMany('App\SintechsActuators');
    }
    
    public function user() {
        return $this->hasMany('App\Users');
    }
    
    public function rule() {
        return $this->hasMany('App\SintechsRules');
    }
    
    public function sampling() {
        return $this->hasMany('App\SintechsSampling');
    }
}
