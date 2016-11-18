<?php

use Illuminate\Database\Migrations\Migration;

class CreateShippingBillingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shipping_billing_addresses', function ($table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('name', 100);
            $table->string('address');
            $table->integer('city_id')->unsigned();
            $table->string('telephone', 50);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('shipping_billing_addresses');
    }
}
