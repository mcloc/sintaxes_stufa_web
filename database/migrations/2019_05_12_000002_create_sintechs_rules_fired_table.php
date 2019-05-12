<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsRulesFiredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_rules_fired', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('rule_value')->nullable();
            $table->float('rule_condition')->nullable();
            $table->unsignedBigInteger('rule_id')->index();
            $table->foreign('rule_id')->references('id')->on('sintechs_rules');

            $table->unsignedBigInteger('sampling_id')->index();
            $table->foreign('sampling_id')->references('id')->on('sintechs_sampling');
            
            $table->unsignedBigInteger('sampling_sensors_id')->index()->nullable();
            $table->foreign('sampling_sensors_id')->references('id')->on('sintechs_sampling_sensors');
            
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
        Schema::dropIfExists('sintechs_rules_fired');
    }
}
