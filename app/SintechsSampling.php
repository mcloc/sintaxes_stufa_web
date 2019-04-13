<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsSampling extends Model
{
    protected $table = 'sintechs_sampling';
    
    public function sensors()
    {
        return $this->belongsToMany(SintechsSamplingSensors::class);
    }
    
    public function actuators()
    {
        return $this->belongsToMany(SintechsSamplingActuators::class);
    }
}
