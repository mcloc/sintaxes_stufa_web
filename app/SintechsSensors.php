<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSensors extends Model
{
    protected $table = 'sintechs_sensors';
    protected $guarded = [];
    
    public function sample_sensors(){
        return $this->belongsToMany(SintechsSamplingSensors::class, 'sensor_id');
    }
    
    public function getDates() {
        return array();
    }
}
