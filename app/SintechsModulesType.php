<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsModulesType extends Model
{
    protected $table = 'sintechs_modules_type';
    
    
    public function modules(){
        return $this->hasMany(SintechsModules::class, 'type_id', 'id');
    }
    
    public function getDates() {
        return array();
    }
}
