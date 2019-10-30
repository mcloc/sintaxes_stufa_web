<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('readed')->nullable()->default(false);
            $table->text('message');
            
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');
            
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
        Schema::dropIfExists('vger_alerts');
    }
}
