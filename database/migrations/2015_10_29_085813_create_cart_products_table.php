<?php

use Illuminate\Database\Migrations\Migration;

class CreateCartProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cart_products', function ($table) {
            $table->increments('id');
            $table->integer('cart_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->datetime('delivery_date');
            $table->integer('quantity')->default(0);
            $table->float('price', 10)->unsigned()->default(0.00);
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('carts')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cart_products');
    }
}
