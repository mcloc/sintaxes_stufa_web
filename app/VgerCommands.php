<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerCommands extends Model
{
    protected $table = 'vger_commands';
    
    public function _4BCP(){
        return $this->hasOne(Vger4BCP::class, 'id', 'id_4BCP');
    }
    
    public function type(){
        return $this->hasOne(VgerCommandsType::class, 'id', 'type_id');
    }
    
    public function getDates() {
        return array();
    }
}
