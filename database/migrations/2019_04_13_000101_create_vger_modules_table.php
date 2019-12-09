<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vger_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description');
            $table->string('mac_address')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('last_status_msg')->nullable();
            $table->text('support_description')->nullable();
            $table->boolean('enabled')->default(false);
            $table->boolean('active')->default(false);
            $table->float('uptime')->default(0);
            $table->unsignedBigInteger('type_id')->index();
            $table->foreign('type_id')->references('id')->on('vger_modules_type');
            
            $table->unsignedInteger('id_4BCP')->unique()->nullable();
            $table->foreign('id_4BCP')->references('id')->on('vger_4bcprotocol');
            
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
        Schema::dropIfExists('vger_modules');
    }
}
