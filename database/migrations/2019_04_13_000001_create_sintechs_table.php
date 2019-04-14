<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintechs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_id');
            $table->timestamp('instalation_date');
            $table->string('sintechs_version');
            $table->timestamp('sintechs_last_update');
            $table->string('employee_id')->default('sintechs');
            $table->text('instalation_description');
            $table->text('instalation_missing_requirements');
            $table->integer('instalation_total_days');
            $table->boolean('tests_software_done')->default(false);
            $table->boolean('tests_eletronics_done')->default(false);
            $table->boolean('tests_mechanical_done')->default(false);
            $table->string('tests_responsable_signature')->nullable();
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
        Schema::dropIfExists('sintechs');
    }
}
