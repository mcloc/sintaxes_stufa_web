<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSamplingSensors extends Model
{
    protected $table = 'sintechs_sampling_sensors';
    protected $guarded = [];
    
    public function sensor() {
        return $this->hasMany('SintechsSensors');
    }
    
    public function sample(){
        return $this->belongsToMany(SintechsSampling::class, 'sampling_id');
    }
    
    public function getDates() {
        return array();
    }
}
