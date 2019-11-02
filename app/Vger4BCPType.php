<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vger4BCPType extends Model
{
    protected $table = 'vger_4bcprotocol';
    
    
//     public function modules(){
//         return $this->hasMany(VgerModules::class, 'type_id', 'id');
//     }
    
    public function getDates() {
        return array();
    }
}
