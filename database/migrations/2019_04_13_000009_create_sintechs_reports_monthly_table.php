<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintechs_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id')->default('system');
            $table->string('svo_number')->nullable();
            $table->string('msg_title');
            $table->text('msg_description');
            $table->string('modules_affected');
            $table->timestamp('solution_date');
            $table->string('solution_title');
            $table->text('solution_description');
            $table->boolean('solved')->default(false);
            $table->timestamp('sintechs_instalation_date');
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
        Schema::dropIfExists('sintechs_reports');
    }
}
