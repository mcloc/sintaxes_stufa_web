<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerActuators extends Model
{
    protected $table = 'vger_actuators';

    public function module(){
        return $this->belongsToMany(VgerModules::class, 'id', 'module_id');
    }
    
    public function getDates() {
        return array();
    }
}
