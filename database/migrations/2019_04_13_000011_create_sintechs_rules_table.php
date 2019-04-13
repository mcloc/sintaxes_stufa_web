<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['alert', 'sensors', 'actuators', 'sampling', 'software']);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('drl_file');
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
        Schema::dropIfExists('sintechs_log');
    }
}
