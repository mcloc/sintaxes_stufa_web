<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerAlerts extends Model
{
    protected $table = 'vger_alerts';
    
    public function module()
    {
        return $this->hasMany(VgerModules::class, 'id', 'module_id');
    }
    
    public static function hasAlert(){
        $alerts = VgerAlerts::where('readed', false)->get();
        
        return count($alerts);
    }
    
    public static function getAllUnreaded(){
        $alerts = VgerAlerts::orderByDesc('created_at')->where('readed', false)->get();
        return $alerts;
    }
    
    public static function getLastAlert(){
        return VgerAlerts::orderByDesc('created_at')->where('readed', false)->first();
    }
    
    public function getDates() {
        return array();
    }
}
