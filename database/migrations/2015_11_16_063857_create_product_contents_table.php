<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_contents', function($table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->enum('type', ['Left Image', 'Right Image', 'White Box', 'Bottom Box'])->default('Left Image');
            $table->text('content_words_locale_id');
            $table->text('content_words');
            $table->string('content_image');
            $table->timestamps();
               $table->foreign('product_id')->references('id')->on('products')
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
        Schema::drop('product_contents');
    }
}
