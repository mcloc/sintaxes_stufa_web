<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsEvent extends Model
{
    protected $table = 'sintechs_events';
    protected $guarded = [];
    
    
    public function ruleFired(){
        return $this->belongsToMany(SintechsRulesFired::class, 'id', 'rule_fired_id');
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
