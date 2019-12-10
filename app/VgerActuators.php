<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerActuators extends Model
{
    protected $table = 'vger_actuators';
    
    public function _4BCP(){
        return $this->hasOne(Vger4BCP::class, 'id', 'id_4BCP');
    }

    public function module(){
        return $this->belongsToMany(VgerModules::class, 'id', 'module_id');
    }
    
    public function getDates() {
        return array();
    }
}
