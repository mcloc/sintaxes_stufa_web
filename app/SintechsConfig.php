<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsConfig extends Model
{
    protected $table = 'sintechs_config';
    
    public function type() {
        return $this->hasMany('App\SintechsType');
    }
    
    public function sensor() {
        return $this->hasMany('App\SintechsSensors');
    }
    
    public function actuator() {
        return $this->hasMany('App\SintechsActuators');
    }
    
    public function rule() {
        return $this->hasMany('App\SintechsRules');
    }
}
