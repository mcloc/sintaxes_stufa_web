<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_commands', function (Blueprint $table) {

            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');
            $table->string('command')->index();
            
            $table->unsignedBigInteger('type_id')->index();
            $table->foreign('type_id')->references('id')->on('vger_commands_type');
            

            
            $table->boolean('enabled');
            $table->string('description');
            $table->timestamps();
            
            $table->primary(['module_id', 'command']);
        });
        

            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vger_commands');
    }
}
