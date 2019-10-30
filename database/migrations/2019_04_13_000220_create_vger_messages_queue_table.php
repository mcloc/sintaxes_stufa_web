<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerMessagesQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_messages_queue', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');
            
            
            $table->unsignedBigInteger('command_queue_id')->index()->nullable();
            $table->foreign('command_queue_id')->references('id')->on('vger_commands_queue');

            $table->char('status');
            $table->text('message_value');
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
        Schema::dropIfExists('vger_messages_queue');
    }
}
