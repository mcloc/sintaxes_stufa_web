<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsModules extends Model
{
    protected $table = 'sintechs_modules';
    
    public function type()
    {
        return $this->belongsToMany(SintechsModulesType::class);
    }
    
    public function sample(){
        return $this->belongsToMany(SintechsSampling::class, 'sampling_id');
    }
    
    public function alert(){
        return $this->belongsToMany(SintechsAlerts::class, 'module_id');
    }
}
