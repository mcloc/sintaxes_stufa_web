<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerModulesSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_modules_sensors', function (Blueprint $table) {
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');
            
            $table->unsignedBigInteger('sensor_id')->index();
            $table->foreign('sensor_id')->references('id')->on('vger_sensors');
            
            $table->boolean('enabled')->default(false);
            $table->primary(['module_id', 'sensor_id']);
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
        Schema::dropIfExists('vger_modules_sensors');
    }
}
