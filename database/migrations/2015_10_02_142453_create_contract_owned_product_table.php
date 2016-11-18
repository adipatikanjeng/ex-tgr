<?php

use Illuminate\Database\Migrations\Migration;

class CreateContractOwnedProductTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contract_owned_products', function ($table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('epc_name', 50);
            $table->timestamps();
            $table->foreign('contract_id')->references('id')->on('contracts')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('contract_owned_products');
    }
}
