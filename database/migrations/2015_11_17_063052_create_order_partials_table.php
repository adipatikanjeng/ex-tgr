<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderPartialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_partials', function($table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
            $table->string('order_number');
            $table->float('shipping_amount', 10)->unsigned()->default(0.00);
            $table->float('total_amount', 10)->unsigned()->default(0.00);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_category_id')->references('id')->on('product_categories')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_partials');
    }
}
