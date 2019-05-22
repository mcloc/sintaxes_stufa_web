<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsSamplingActuatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_sampling_actuators', function (Blueprint $table) {
            $table->unsignedBigInteger('sampling_id')->index();
            $table->foreign('sampling_id')->references('uuid')->on('sintechs_sampling');
            
            $table->unsignedBigInteger('actuator_id')->index();
            $table->foreign('actuator_id')->references('id')->on('sintechs_actuators');
            
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
        Schema::dropIfExists('sintechs_sampling_actuators');
    }
}
