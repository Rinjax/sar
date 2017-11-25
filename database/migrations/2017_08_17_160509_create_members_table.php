<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gid')->nullable()->default(null);
            $table->string('gavatar')->nullable()->default(null);
            $table->string('callsign',5);
            $table->string('name');
            $table->string('contact', 11);
            $table->string('email');
            $table->string('password')->nullable()->default(null);
            $table->string('profile_pic')->default('default.jpg');
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
}
