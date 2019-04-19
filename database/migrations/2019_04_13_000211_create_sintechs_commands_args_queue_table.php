<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsCommandsArgsQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_commands_args_queue', function (Blueprint $table) {
            $table->unsignedBigInteger('command_id')->index();
            $table->foreign('command_id')->references('id')->on('sintechs_commands_queue');

            $table->unsignedBigInteger('command_args_id')->index();
            $table->foreign('command_args_id')->references('id')->on('sintechs_commands_args');

            $table->string('value_arg');
            $table->primary(['command_id', 'command_args_id']);
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
        Schema::dropIfExists('sintechs_commands_args_queue');
    }
}
