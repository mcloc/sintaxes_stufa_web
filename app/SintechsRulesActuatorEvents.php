<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsRulesActuatorEvents extends Model
{
    protected $table = 'sintechs_rules_events_actuators';
    protected $guarded = [];
    
    
    public function ruleFired(){
        return $this->belongsToMany(SintechsRulesFired::class, 'id', 'rule_fired_id');
    }
    
    public function module() {
        return $this->hasMany(SintechsModules::class, 'id', 'module_id');
    }
    
    public function actuator() {
        return $this->hasMany(SintechsActuators::class)->whereHas('sintechs_actuators', function ($query) {
            $query->where('actuator_uuid', $this->actuator_uuid);
        })->get();
    }
    
    
    
    public function calculateStatusTime() {
        //TODO: now() - created_at;
    }

    
    public function getDates() {
        return array();
    }
}
