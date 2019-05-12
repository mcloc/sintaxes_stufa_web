<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsRulesFired extends Model
{
    protected $table = 'sintechs_rules_fired';
    protected $guarded = [];
    
    
    public function rule(){
        return $this->belongsToMany(SintechsRules::class, 'id', 'rule_id');
    }
    
    public function events_actuator(){
        return $this->hasMany(SintechsRulesActuatorEvents::class, 'id', 'rule_fired_id');
    }
    
    public function getDates() {
        return array();
    }
}
