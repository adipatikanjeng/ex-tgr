<?php

use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('provinces', function ($table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('provinces');
    }
}
