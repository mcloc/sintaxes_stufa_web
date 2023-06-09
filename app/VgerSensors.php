<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerSensors extends Model
{
    protected $table = 'vger_sensors';
    protected $guarded = [];
    
    public function _4BCP(){
        return $this->hasOne(Vger4BCP::class, 'id', 'id_4BCP');
    }
    
    public function sample_sensors(){
        return $this->belongsToMany(VgerSamplingSensors::class, 'sensor_id');
    }
    
    public function getDates() {
        return array();
    }
}
