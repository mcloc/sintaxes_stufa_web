<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_log', function (Blueprint $table) {
            $table->bigIncrements('id');
//             $table->enum('type', ['module', 'sensors', 'actuators', 'sampling', 'software', 'rules', 'config']);
            
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('value');
            $table->string('previous_value')->nullable();
            
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('vger_types');
            
            
            $table->unsignedBigInteger('sensor_id')->nullable();
            $table->foreign('sensor_id')->references('id')->on('vger_sensors');
            
            $table->unsignedBigInteger('actuator_id')->nullable();
            $table->foreign('actuator_id')->references('id')->on('vger_actuators');
            
            $table->unsignedBigInteger('trigged_by_rule')->nullable();
            $table->foreign('trigged_by_rule')->references('id')->on('vger_rules');
            
            $table->unsignedBigInteger('sampling_id')->nullable();
            $table->foreign('sampling_id')->references('uuid')->on('vger_sampling');

            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('vger_users');
            
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
        Schema::dropIfExists('vger_log');
    }
}
