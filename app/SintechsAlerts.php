<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Sintechs\SamplingController;

class SintechsAlerts extends Model
{
    protected $table = 'sintechs_alerts';
    
    public function module()
    {
        return $this->hasMany(SintechsModules::class, 'id', 'module_id');
    }
    
    public static function hasAlert(){
        return SintechsAlerts::where('readed', false)->first();
    }
    
    public static function getLastAlert(){
        return SintechsAlerts::orderByDesc('created_at')->where('readed', false)->first();
    }
}
