<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerRules extends Model
{
    protected $table = 'vger_rules';
    protected $guarded = [];
    
    public function module()
    {
        return $this->hasMany(VgerModules::class, 'id', 'module_id');
    }
    
    public function getDates() {
        return array();
    }
}
