<?php

use Illuminate\Database\Migrations\Migration;

class CreateCoveredAreasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('covered_areas', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('postal_code', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('covered_areas');
    }
}
