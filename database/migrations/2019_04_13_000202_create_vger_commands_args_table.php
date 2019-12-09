<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerCommandsArgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_commands_args', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('arg_name')->index();
            
            $table->unsignedBigInteger('command_id')->index();
            $table->foreign('command_id')->references('id')->on('vger_commands');
            
            $table->string('description');
            
            $table->unsignedInteger('id_4BCP')->unique()->nullable();
            $table->foreign('id_4BCP')->references('id')->on('vger_4bcprotocol');
            
            $table->timestamps();
            
            $table->unique(['arg_name', 'command_id']);
        });
        

            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vger_commands_args');
    }
}
