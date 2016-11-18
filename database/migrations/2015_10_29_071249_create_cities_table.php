<?php

use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cities', function ($table) {
            $table->increments('id');
            $table->integer('province_id')->unsigned();
            $table->string('name', 50);
            $table->enum('is_covered', ['Y', 'N'])->default('N');
            $table->timestamps();
            $table->foreign('province_id')->references('id')->on('provinces')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('cities');
    }
}
