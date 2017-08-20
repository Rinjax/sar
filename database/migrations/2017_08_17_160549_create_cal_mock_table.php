<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalMockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cal_mock', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessor_id');
            $table->integer('handler_id');
            $table->integer('location_id');
            $table->dateTime('start');
            $table->timestamps();
            $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cal_mock');
    }
}
