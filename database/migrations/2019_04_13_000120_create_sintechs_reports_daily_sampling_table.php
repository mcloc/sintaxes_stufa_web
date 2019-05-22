<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsReportsDailySamplingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_reports_daily_sampling', function (Blueprint $table) {

            $table->unsignedBigInteger('reports_daily_id')->index();
            $table->foreign('reports_daily_id')->references('id')->on('sintechs_reports_daily');
            
            $table->unsignedBigInteger('sampling_id')->index();
            $table->foreign('sampling_id')->references('uuid')->on('sintechs_sampling');
            
            $table->primary(['reports_daily_id', 'sampling_id']);
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
