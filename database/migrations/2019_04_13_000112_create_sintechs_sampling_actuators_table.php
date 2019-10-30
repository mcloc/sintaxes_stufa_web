<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerSamplingActuatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_sampling_actuators', function (Blueprint $table) {
            $table->unsignedBigInteger('sampling_id')->index();
            $table->foreign('sampling_id')->references('uuid')->on('vger_sampling');
            
            $table->unsignedBigInteger('actuator_id')->index();
            $table->foreign('actuator_id')->references('id')->on('vger_actuators');
            
            $table->boolean('active')->default(false);
            $table->bigInteger('activated_time')->nullable();
            $table->timestamps();
            
            $table->primary(['sampling_id', 'actuator_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vger_sampling_actuators');
    }
}
