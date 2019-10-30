<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerReportsWeeklyDaily extends Model
{
    protected $table = 'vger_reports_weekly_daily';
    
    public function daily()
    {
        return $this->belongsToMany(VgerReportsDaily::class);
    }
}
