<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerModulesActuatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_modules_actuators', function (Blueprint $table) {
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');
            
            $table->unsignedBigInteger('actuator_id')->index();
            $table->foreign('actuator_id')->references('id')->on('vger_actuators');
            
            $table->boolean('enabled')->default(false);
            $table->primary(['module_id', 'actuator_id']);
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
        Schema::dropIfExists('vger_modules_actuators');
    }
}
