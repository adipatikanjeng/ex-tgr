<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('article_comments', function ($table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->enum('is_display', ['N', 'Y'])->default('N');
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles')
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
        Schema::drop('article_comments');
    }
}
