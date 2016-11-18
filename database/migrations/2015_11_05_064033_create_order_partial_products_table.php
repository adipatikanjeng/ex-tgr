<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderPartialProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_partial_products', function ($table) {
            $table->increments('id');
            $table->integer('order_partial_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->float('total_price', 10)->unsigned()->default(0.00);
            $table->string('product_pricelist_code', 50)->nullable()->default(null);
            $table->timestamps();
            $table->foreign('order_partial_id')->references('id')->on('order_partials')
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
        Schema::drop('order_partial_products');
    }
}
