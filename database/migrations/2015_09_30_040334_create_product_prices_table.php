<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_prices', function ($table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('installment');
            $table->float('dp_amount', 10)->unsigned()->default(0.00);
            $table->float('amount_installment', 10)->unsigned()->default(0.00);
            $table->float('total_price', 10)->unsigned()->default(0.00);
            $table->string('sales_unit', 100);
            $table->string('sales_type', 100);
            $table->float('cash_value', 10)->unsigned()->default(0.00);
            $table->float('commission', 10)->unsigned()->default(0.00);
            $table->integer('stock');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('product_prices');
    }
}
