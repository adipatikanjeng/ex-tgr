<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function ($table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('title', 100);
            $table->string('title_locale_id', 100);
            $table->string('short_desc');
            $table->string('short_desc_locale_id');
            $table->text('content');
            $table->text('content_locale_id');
            $table->string('img');
            $table->timestamps();
            $table->enum('is_display', ['Y', 'N'])->default('N');
            $table->foreign('category_id')->references('id')->on('article_categories')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
