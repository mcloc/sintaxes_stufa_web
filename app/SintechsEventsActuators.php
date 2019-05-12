<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsEventsActuators extends Model
{
    protected $table = 'sintechs_events_actuators';
    
    public function event(){
        return $this->belongsToMany(SintechsEvent::class, 'id', 'event_id');
    }
    
    public function actuator() {
        return $this->hasMany(SintechsActuators::class,'id', 'actuator_id');
    }
    

}
