<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerRulesActuatorEvents extends Model
{
    protected $table = 'vger_rules_events_actuators';
    protected $guarded = [];
    
    
    public function ruleFired(){
        return $this->belongsToMany(VgerRulesFired::class, 'id', 'rule_fired_id');
    }
    
    public function module() {
        return $this->hasMany(VgerModules::class, 'id', 'module_id');
    }
    
    public function actuator() {
        return $this->hasMany(VgerActuators::class)->whereHas('vger_actuators', function ($query) {
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
