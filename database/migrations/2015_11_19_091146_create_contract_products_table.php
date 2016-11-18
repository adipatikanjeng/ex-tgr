<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_products', function ($table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->float('total_price', 10)->unsigned()->default(0.00);
            $table->integer('installment_number')->nullable->default(null);
            $table->string('discount_code', 50)->nullable();
            $table->timestamps();
            $table->foreign('contract_id')->references('id')->on('contracts')
            ->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contract_products');
    }
}
