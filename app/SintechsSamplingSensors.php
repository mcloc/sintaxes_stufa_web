<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSamplingSensors extends Model
{
    protected $table = 'sintechs_sampling_sensors';
    protected $guarded = [];
    
    
    public function sensor(){
        return $this->hasMany(SintechsSensors::class, 'id', 'sensor_id');
    }
    
    public function sample(){
        return $this->belongsToMany(SintechsSampling::class, 'id', 'sampling_id');
    }
    
    public function rules()
    {
        return $this->hasMany(SintechsRulesFired::class, 'sampling_sensors_id', 'id');
    }

    
    public function getDates() {
        return array();
    }
}
