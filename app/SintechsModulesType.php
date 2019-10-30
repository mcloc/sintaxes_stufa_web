<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerModulesType extends Model
{
    protected $table = 'vger_modules_type';
    
    
    public function modules(){
        return $this->hasMany(VgerModules::class, 'type_id', 'id');
    }
    
    public function getDates() {
        return array();
    }
}
