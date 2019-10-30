<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerSamplingSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_sampling_sensors', function (Blueprint $table) {
            $table->timestamp('sampling_id')->index();
            $table->foreign('sampling_id')->references('uuid')->on('vger_sampling');
            
            $table->unsignedBigInteger('sensor_id')->index();
            $table->foreign('sensor_id')->references('id')->on('vger_sensors');
            
            $table->string('measure_type')->index();
            $table->string('value');
            $table->timestamps();
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
        Schema::dropIfExists('vger_sampling_sensors');
    }
}
