<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_errors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('module');
            $table->string('level');
            $table->boolean('reported')->false();
            
            $table->unsignedBigInteger('sensor_id')->nullable();
            $table->foreign('sensor_id')->references('id')->on('sintechs_sensors');

            $table->unsignedBigInteger('actuator_id')->nullable();
            $table->foreign('actuator_id')->references('id')->on('sintechs_actuators');
            
            $table->unsignedBigInteger('rule_id')->nullable();
            $table->foreign('rule_id')->references('id')->on('sintechs_rules');
            
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
        Schema::dropIfExists('sintechs_errors');
    }
}
