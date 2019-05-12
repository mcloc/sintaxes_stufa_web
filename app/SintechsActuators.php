<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsActuators extends Model
{
    protected $table = 'sintechs_actuators';

    public function module(){
        return $this->belongsToMany(SintechsModules::class, 'id', 'module_id');
    }
    
    public function getDates() {
        return array();
    }
}
