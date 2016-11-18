<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_confirmations', function($table){
            $table->increments('id');
            $table->string('order_number', 50);
            $table->integer('bank_id')->unsigned();
            $table->string('bank_name', 50);
            $table->string('account_name', 50);
            $table->string('account_number', 50);
            $table->datetime('transfer_date');
            $table->enum('is_confirmed', ['Y', 'N'])->default('N');
            $table->float('amount', 10)->unsigned()->default(0.00);
            $table->string('file', 50);
            $table->timestamps();
              $table->foreign('bank_id')->references('id')->on('banks')
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
        Schema::drop('payment_confirmations');
    }
}
