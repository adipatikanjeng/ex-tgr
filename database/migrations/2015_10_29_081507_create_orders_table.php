<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function ($table) {
            $table->increments('id');
            $table->string('order_number', 50);
            $table->integer('customer_id')->unsigned();
            $table->float('shipping_amount', 10)->unsigned()->default(0.00);
            $table->float('total_amount', 10)->unsigned()->default(0.00);
            $table->enum('payment_method', ['Credit Card', 'Bank Transfer'])->default('Bank Transfer');
            $table->integer('status_id')->unsigned();
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('order_status')
            ->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
