<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsEvent extends Model
{
    protected $table = 'sintechs_events';
    protected $guarded = [];
    
    
    public function rule(){
        return $this->belongsToMany(SintechsRules::class, 'id', 'rule_id');
    }
    
    public function sample(){
        return $this->hasMany(SintechsSampling::class, 'id', 'sampling_id');
    }
    
    public function events_actuators(){
        return $this->hasMany(SintechsEventsActuators::class, 'sintechs_events_actuators');
    }
    
    
    public function calculateStatusTime() {
        //TODO: now() - created_at;
    }

    
    public function getDates() {
        return array();
    }
}
