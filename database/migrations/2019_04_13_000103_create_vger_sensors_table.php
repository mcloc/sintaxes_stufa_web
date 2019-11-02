<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_sensors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid')->unique();
            
            $table->string('type');
            $table->string('description')->nullable();
            $table->string('model');
            $table->boolean('active')->default(false);
            $table->boolean('enabled')->default(false);
            $table->string('last_status_msg')->nullable();
            $table->text('support_description')->nullable();
            
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');
            
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
        Schema::dropIfExists('vger_sensors');
    }
}
