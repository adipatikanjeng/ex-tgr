<?php

use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('galleries', function ($table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('title_locale_id', 100);
            $table->text('short_desc');
            $table->text('short_desc_locale_id');
            $table->text('desc');
            $table->text('desc_locale_id');
            $table->date('publish_date');
            $table->string('img', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('galleries');
    }
}
