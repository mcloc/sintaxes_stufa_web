<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsRules extends Model
{
    protected $table = 'sintechs_rules';
    protected $guarded = [];
    
    public function module()
    {
        return $this->hasMany(SintechsModules::class, 'id', 'module_id');
    }
    
    public function getDates() {
        return array();
    }
}
