<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('name_locale_id', 100);
            $table->text('home_display');
            $table->text('home_display_locale_id');
            $table->string('short_desc');
            $table->string('short_desc_locale_id');
            $table->text('desc');
            $table->text('desc_locale_id');
            $table->date('publish_date');
            $table->string('img');
            $table->date('start_date');
            $table->date('finish_date');
            $table->enum('is_seminar', ['Y', 'N'])->default('N');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('events');
    }
}
