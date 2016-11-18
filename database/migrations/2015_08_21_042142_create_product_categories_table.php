<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_categories', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('name_locale_id', 100);
            $table->string('short_desc_locale_id', 100);
            $table->string('short_desc', 100);
            $table->string('img', 100);
            $table->string('permalink', 100);
            $table->text('desc');
            $table->text('desc_locale_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('product_categories');
    }
}
