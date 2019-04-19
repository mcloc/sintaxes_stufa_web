<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsSamplingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_sampling', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('sintechs_modules');
            
            $table->string('status');
            $table->bigInteger('uptime');
            $table->string('error_code')->nullable();
            $table->string('error_msg')->nullable();
            
            
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
        Schema::dropIfExists('sintechs_sampling');
    }
}
