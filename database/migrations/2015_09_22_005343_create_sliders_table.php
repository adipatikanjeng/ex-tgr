<?php

use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sliders', function ($table) {
            $table->increments('id');
            $table->string('img', 100);
            $table->text('caption');
            $table->text('caption_locale_id');
            $table->enum('is_display', array('Y', 'N'))->default('N');
            $table->string('url', 100);
            $table->integer('order');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('sliders');
    }
}
