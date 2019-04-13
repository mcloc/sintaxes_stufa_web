<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsSamplingSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_sampling_sensors', function (Blueprint $table) {
            $table->unsignedBigInteger('sampling_id')->index();
            $table->foreign('sampling_id')->references('id')->on('sintechs_sampling');
            
            $table->unsignedBigInteger('sensor_id')->index();
            $table->foreign('sensor_id')->references('id')->on('sintechs_sensors');
            
            $table->string('measure_type')->index();
            $table->string('value');
            
            $table->primary(['sampling_id', 'sensor_id','measure_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sintechs_sampling_sensors');
    }
}
