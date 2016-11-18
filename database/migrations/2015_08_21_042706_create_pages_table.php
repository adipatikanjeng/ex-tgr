<?php

use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pages', function ($table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('title_locale_id', 100);
            $table->text('content');
            $table->text('content_locale_id');
            $table->string('code', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
