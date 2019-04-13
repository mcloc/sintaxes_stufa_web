<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['module', 'sensors', 'actuators', 'sampling', 'software', 'rules']);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('value');
            
            $table->unsignedBigInteger('sensor_id')->nullable();
            $table->foreign('sensor_id')->references('id')->on('sintechs_sensors');
            
            $table->unsignedBigInteger('actuator_id')->nullable();
            $table->foreign('actuator_id')->references('id')->on('sintechs_actuators');
            
            $table->unsignedBigInteger('trigged_by_rule')->nullable();
            $table->foreign('trigged_by_rule')->references('id')->on('sintechs_rules');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sintechs_log');
    }
}
