<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VgerReportsDailySampling extends Model
{
    protected $table = 'vger_reports_daily_sampling';
    
    public function sampling()
    {
        return $this->belongsToMany(VgerSampling::class);
    }
}
