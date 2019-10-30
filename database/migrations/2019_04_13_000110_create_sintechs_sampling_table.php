<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerSamplingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_sampling', function (Blueprint $table) {
            $table->timestamp('uuid')->index();
            $table->integer('hashCode');
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');
            
            $table->string('status');
            $table->bigInteger('uptime');
            $table->string('error_code')->nullable();
            $table->string('error_msg')->nullable();
            $table->timestamps();
            
            $table->primary('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vger_sampling');
    }
}
