<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerRulesActuatorsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_rules_actuator_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('rule_fired_id')->index();
            $table->foreign('rule_fired_id')->references('id')->on('vger_rules_fired');
            
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('module_id')->references('id')->on('vger_modules');

            $table->String('actuator_uuid');
            $table->boolean('value');
            $table->float('duration_time'); // seconds // 0 (zero) just begun
            $table->string('cause_description');
            $table->boolean('event_finished'); // 1 = DONE, 0 = PENDING TO CONCLUDE
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
        Schema::dropIfExists('vger_events');
    }
}
