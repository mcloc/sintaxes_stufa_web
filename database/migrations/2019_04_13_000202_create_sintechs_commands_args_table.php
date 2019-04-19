<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsCommandsArgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_commands_args', function (Blueprint $table) {
            $table->string('arg_name')->index();
            
            $table->unsignedBigInteger('command_id')->index();
            $table->foreign('command_id')->references('id')->on('sintechs_commands');
            
            $table->string('description');
            $table->timestamps();
            
            $table->primary(['arg_name', 'command_id']);
        });
        

            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sintechs_commands_args');
    }
}
