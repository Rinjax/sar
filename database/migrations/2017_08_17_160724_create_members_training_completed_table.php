<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTrainingCompletedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_training_completed', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->date('firstaid')->nullable()->default(null);
            $table->date('watersafety')->nullable()->default(null);
            $table->date('fitness')->nullable()->default(null);
            $table->date('navs')->nullable()->default(null);
            $table->boolean('silver_navs')->default(false);
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
        Schema::dropIfExists('members_training_completed');
    }
}
