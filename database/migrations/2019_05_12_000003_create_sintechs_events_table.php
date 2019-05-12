<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('sintechs_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('event_status'); // 1 = DONE, 0 = PENDING TO CONCLUDE
            
            $table->unsignedBigInteger('rule_id')->index();
            $table->foreign('rule_id')->references('id')->on('sintechs_rules');

            $table->unsignedBigInteger('sampling_id')->index();
            $table->foreign('sampling_id')->references('id')->on('sintechs_sampling');
            
            $table->float('duration_time'); // seconds // 0 (zero) just begun
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
        Schema::dropIfExists('sintechs_events');
    }
}
