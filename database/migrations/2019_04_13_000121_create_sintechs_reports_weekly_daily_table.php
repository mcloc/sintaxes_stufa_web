<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsReportsWeeklyDailyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_reports_weekly_daily', function (Blueprint $table) {
            
            $table->unsignedBigInteger('reports_weekly_id')->index();
            $table->foreign('reports_weekly_id')->references('id')->on('sintechs_reports_weekly');
            
            $table->unsignedBigInteger('reports_daily_id')->index();
            $table->foreign('reports_daily_id')->references('id')->on('sintechs_reports_daily');
            
            $table->primary(['reports_weekly_id', 'reports_daily_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sintechs_reports');
    }
}
