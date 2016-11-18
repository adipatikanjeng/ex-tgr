<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_quotations', function ($table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('telephone', 50);
            $table->string('city', 100);
            $table->integer('source_id')->unsigned();
            $table->integer('child_age');
            $table->text('message');
            $table->timestamps();
            $table->foreign('source_id')->references('id')->on('sources')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('product_quotations');
    }
}
