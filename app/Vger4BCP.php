<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vger4BCP extends Model
{
    protected $table = 'vger_4bcprotocol';
    
    
    public function getHexUUID(){
        return dechex($this->uuid_4BCP);
    }
    
//     public function modules(){
//         return $this->hasMany(VgerModules::class, 'type_id', 'id');
//     }

    
    public function getDates() {
        return array();
    }
}
