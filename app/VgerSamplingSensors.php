<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerSamplingSensors extends Model
{
    protected $table = 'vger_sampling_sensors';
    protected $guarded = [];
    
    
    public function sensor(){
        return $this->hasMany(VgerSensors::class, 'id', 'sensor_id');
    }
    
    public function sample(){
        return $this->belongsToMany(VgerSampling::class, 'id', 'sampling_id');
    }
    
    public function rules()
    {
        return $this->hasMany(VgerRulesFired::class, 'sampling_sensors_id', 'id');
    }

    
    public function getDates() {
        return array();
    }
}
