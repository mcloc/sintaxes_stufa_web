<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsModules extends Model
{
    protected $table = 'sintechs_modules';
    
    public function type()
    {
        return $this->belongsToMany(SintechsModulesTypes::class);
    }
}
