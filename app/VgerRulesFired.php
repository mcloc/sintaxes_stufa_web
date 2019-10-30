<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerRulesFired extends Model
{
    protected $table = 'vger_rules_fired';
    protected $guarded = [];
    
    
    public function rule(){
        return $this->belongsToMany(VgerRules::class, 'id', 'rule_id');
    }
    
    public function events_actuator(){
        return $this->hasMany(VgerRulesActuatorEvents::class, 'id', 'rule_fired_id');
    }
    
    public function getDates() {
        return array();
    }
}
