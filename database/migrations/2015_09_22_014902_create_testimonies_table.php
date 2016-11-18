<?php

use Illuminate\Database\Migrations\Migration;

class CreateTestimoniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('testimonies', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('content');
            $table->text('content_locale_id');
            $table->string('img', 100);
            $table->enum('is_active', array('Y', 'N'))->default('N');
            $table->integer('order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('testimonies');
    }
}
