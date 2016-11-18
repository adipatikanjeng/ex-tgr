<?php

use Illuminate\Database\Migrations\Migration;

class CreateGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gallery_images', function ($table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();
            $table->string('img', 100);
            $table->timestamps();
            $table->foreign('gallery_id')->references('id')->on('galleries')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('gallery_images');
    }
}
