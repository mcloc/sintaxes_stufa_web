<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVgerEventsActuatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('vger_events_actuators', function (Blueprint $table) {
            
            $table->unsignedBigInteger('event_id')->index();
            $table->foreign('event_id')->references('id')->on('vger_events');
            
            $table->unsignedBigInteger('actuator_id')->index();
            $table->foreign('actuator_id')->references('id')->on('vger_actuators');
            
            $table->boolean('event_status'); // 1 = DONE, 0 = PENDING TO CONCLUDE
            $table->boolean('actuator_value');
            $table->float('period'); // seconds // 0 (zero) until another event changes it
            $table->float('duration_time'); // seconds // 0 (zero) just begun
            $table->timestamps();
            
            $table->primary(['event_id', 'actuator_id']);
        });
        

            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vger_events_actuators');
    }
}
