<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('readed')->nullable()->default(false);
            $table->text('message');
            
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('sintechs_modules');
            
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
        Schema::dropIfExists('sintechs_messages_queue');
    }
}
