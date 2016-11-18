<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeminarPlacesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seminar_places', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('seminar_places');
    }
}
