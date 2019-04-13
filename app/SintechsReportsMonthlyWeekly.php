<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsReportsMonthlyWeekly extends Model
{
    protected $table = 'sintechs_reports_monthly_weekly';
    
    public function weekly()
    {
        return $this->belongsToMany(SintechsReportsWeekly::class);
    }
}
