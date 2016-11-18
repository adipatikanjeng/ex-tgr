<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeminarTopicsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seminar_topics', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('name_locale_id', 100);
            $table->text('desc');
            $table->text('desc_locale_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('seminar_topics');
    }
}
