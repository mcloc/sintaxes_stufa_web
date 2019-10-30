<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerRulesFiredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_rules_fired', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rule_value')->nullable();
            $table->string('rule_condition')->nullable();
            
            $table->unsignedBigInteger('rule_id')->index();
            $table->foreign('rule_id')->references('id')->on('vger_rules');
            
            $table->string('sensor_uuid')->nullable();
            $table->string('cause_description');
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
        Schema::dropIfExists('vger_rules_fired');
    }
}
