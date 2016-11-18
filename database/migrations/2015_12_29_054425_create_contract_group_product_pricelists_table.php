<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractGroupProductPricelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_group_product_pricelists', function($table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned()->default(null);
            $table->string('group_pricelist_code');
            $table->integer('installment_number')->nullable->default(null);
            $table->timestamps();
            $table->foreign('contract_id')->references('id')->on('contracts')
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
        Schema::drop('contract_group_product_pricelists');
    }
}
