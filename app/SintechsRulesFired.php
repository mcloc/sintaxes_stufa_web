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
    
    public function sampling_sensor(){
        return $this->hasMany(SintechsSamplingSensors::class, 'id', 'sampling_sensors_id');
    }
    
    public function sample(){
        return $this->hasMany(SintechsSampling::class, 'id', 'sampling_id');
    }

    
    public function getDates() {
        return array();
    }
}
