<?php

use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sources', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('name_locale_id', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('sources');
    }
}
