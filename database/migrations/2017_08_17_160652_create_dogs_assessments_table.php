<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dog_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dog_id')->nullable()->default(null);
            $table->integer('handler_id')->nullable()->default(null);
            $table->integer('assessor_1_id');
            $table->integer('assessor_2_id')->nullable()->default(null);
            $table->integer('cal_mock_id');
            $table->string('type')->nullable()->default(null);
            $table->boolean('passed')->nullable()->default(null);
            $table->text('comment')->nullable()->default(null);
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
        Schema::dropIfExists('dog_assessments');
    }
}
