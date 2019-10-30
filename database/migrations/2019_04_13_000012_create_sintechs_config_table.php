<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_config', function (Blueprint $table) {
            $table->bigIncrements('id');
//             $table->enum('type', ['module', 'sensors', 'actuators', 'sampling', 'software','rule']);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('value');
            $table->boolean('active')->default(false);
            
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('vger_types');
            
            $table->unsignedBigInteger('sensor_id')->nullable();
            $table->foreign('sensor_id')->references('id')->on('vger_sensors');
            
            $table->unsignedBigInteger('actuator_id')->nullable();
            $table->foreign('actuator_id')->references('id')->on('vger_actuators');
            
            $table->unsignedBigInteger('rule_id')->nullable();
            $table->foreign('rule_id')->references('id')->on('vger_rules');
            
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
        Schema::dropIfExists('vger_config');
    }
}
