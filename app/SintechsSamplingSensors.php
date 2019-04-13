<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSamplingSensors extends Model
{
    protected $table = 'sintechs_sampling_sensors';
    
    public function sensor() {
        return $this->hasMany('App\SintechsSensors');
    }
}
