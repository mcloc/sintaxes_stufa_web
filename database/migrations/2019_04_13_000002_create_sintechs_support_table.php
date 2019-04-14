<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSintechsSupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sintechs_support', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employee_id')->default('sintechs_system');
            $table->string('svo_number')->nullable();
            $table->string('msg_title');
            $table->text('msg_description');
            $table->string('modules_affected');
            $table->timestamp('solution_date');
            $table->string('solution_title');
            $table->text('solution_description');
            $table->boolean('solved')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('sintechs_support');
    }
}
