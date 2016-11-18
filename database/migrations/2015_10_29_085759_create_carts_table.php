<?php

use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('carts', function ($table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('session_code', 100);
            $table->float('total_amount', 10)->unsigned()->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('carts');
    }
}
