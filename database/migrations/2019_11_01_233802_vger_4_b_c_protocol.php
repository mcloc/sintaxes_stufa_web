<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vger4BCProtocol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_4bcprotocol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid_4BCP')->unique();
            
            $table->string('description')->nullable();
            $table->boolean('active')->default(false);
            
            $table->unsignedInteger('type_4BCP')->index();
            $table->foreign('type_4BCP')->references('id')->on('vger_4bcprotocol_types');
            
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
        Schema::dropIfExists('vger_4bcprotocol');
    }
}
