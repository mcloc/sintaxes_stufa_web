<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerSensors extends Model
{
    protected $table = 'vger_sensors';
    protected $guarded = [];
    
    public function sample_sensors(){
        return $this->belongsToMany(VgerSamplingSensors::class, 'sensor_id');
    }
    
    public function getDates() {
        return array();
    }
}
