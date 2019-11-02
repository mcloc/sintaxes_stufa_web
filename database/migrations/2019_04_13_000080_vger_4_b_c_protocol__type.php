<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vger4BCProtocolType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_4bcprotocol_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('start_range');
            $table->unsignedInteger('end_range');
            $table->string('type');
            $table->string('description')->nullable();
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('vger_4bcprotocol_types');
    }
}
