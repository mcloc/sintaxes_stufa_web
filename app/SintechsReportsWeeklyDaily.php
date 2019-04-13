<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsReportsWeeklyDaily extends Model
{
    protected $table = 'sintechs_reports_weekly_daily';
    
    public function daily()
    {
        return $this->belongsToMany(SintechsReportsDaily::class);
    }
}
