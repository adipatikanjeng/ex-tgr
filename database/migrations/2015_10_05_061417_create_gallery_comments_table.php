<?php

use Illuminate\Database\Migrations\Migration;

class CreateGalleryCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('gallery_comments', function ($table) {
            $table->increments('id');
            $table->integer('gallery_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->enum('is_display', ['N', 'Y'])->default('N');
            $table->timestamps();
            $table->foreign('gallery_id')->references('id')->on('galleries')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('gallery_comments');
    }
}
