<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('article_categories', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('name_locale_id', 100);
            $table->string('permalink', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('article_categories');
    }
}
