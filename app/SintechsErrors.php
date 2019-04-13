<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsErrors extends Model
{
    protected $table = 'sintechs_errors';
    
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
