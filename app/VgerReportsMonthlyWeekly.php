<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerReportsMonthlyWeekly extends Model
{
    protected $table = 'vger_reports_monthly_weekly';
    
    public function weekly()
    {
        return $this->belongsToMany(VgerReportsWeekly::class);
    }
}
