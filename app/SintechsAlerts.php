<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsAlerts extends Model
{
    protected $table = 'sintechs_alerts';
    
    public function module()
    {
        return $this->hasMany(SintechsModules::class, 'id', 'module_id');
    }
}
