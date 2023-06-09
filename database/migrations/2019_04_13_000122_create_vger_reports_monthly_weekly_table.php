<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerReportsMonthlyWeeklyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_reports_monthly_weekly', function (Blueprint $table) {

            $table->unsignedBigInteger('reports_monthly_id')->index();
            $table->foreign('reports_monthly_id')->references('id')->on('vger_reports_monthly');
            
            $table->unsignedBigInteger('reports_weekly_id')->index();
            $table->foreign('reports_weekly_id')->references('id')->on('vger_reports_weekly');
            
            $table->primary(['reports_monthly_id', 'reports_weekly_id'], 'reports_monthly_weekly');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vger_reports');
    }
}
