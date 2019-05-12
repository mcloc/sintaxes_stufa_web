<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsModules extends Model
{
    protected $table = 'sintechs_modules';
    
    public function type(){
        return $this->belongsToMany(SintechsModulesType::class, 'id', 'type_id');
    }
    
    public function samplings(){
        return $this->hasMany(SintechsSampling::class, 'sampling_id');
    }
    
    public function alerts(){
        return $this->hasMany(SintechsAlerts::class, 'module_id');
    }
}
