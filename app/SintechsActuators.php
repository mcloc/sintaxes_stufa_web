<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsActuators extends Model
{
    protected $table = 'sintechs_actuators';
    
    public function getDates() {
        return array();
    }
}
