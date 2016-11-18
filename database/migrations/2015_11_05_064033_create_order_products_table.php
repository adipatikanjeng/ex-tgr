<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_products', function ($table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->float('total_price', 10)->unsigned()->default(0.00);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')
            ->onUpdate('cascade');
             $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('order_products');
    }
}
