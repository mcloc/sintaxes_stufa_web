<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerModules extends Model
{
    protected $table = 'vger_modules';
    
    public function type(){
        return $this->hasOne(VgerModulesType::class, 'id', 'type_id');
    }
    
    public function samplings(){
        return $this->hasMany(VgerSampling::class, 'sampling_id');
    }
    
    public function alerts(){
        return $this->hasMany(VgerAlerts::class, 'module_id');
    }
    
    public function getDates() {
        return array();
    }
}
