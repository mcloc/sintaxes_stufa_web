<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SintechsReportsDailySampling extends Model
{
    protected $table = 'sintechs_reports_daily_sampling';
    
    public function sampling()
    {
        return $this->belongsToMany(SintechsSampling::class);
    }
}
