<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_status', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('order_status');
    }
}
