<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('member_id');
            $table->integer('stock_id');
            $table->integer('qty');
            $table->date('requested_date');
            $table->date('fulfillment_date')->nullable()->default(null);
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_stock');
    }
}
