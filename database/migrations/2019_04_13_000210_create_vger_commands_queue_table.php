<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerCommandsQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_commands_queue', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('command_id')->index();
            $table->foreign('command_id')->references('id')->on('vger_commands');

            $table->char('status');
            $table->string('description');
            $table->string('created_by');
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
        Schema::dropIfExists('vger_commands_queue');
    }
}
