<?php

use Illuminate\Database\Migrations\Migration;

class CreateShippingFeesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shipping_fees', function ($table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->float('cost', 10,2)->default(0.00);
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('shipping_fees');
    }
}
