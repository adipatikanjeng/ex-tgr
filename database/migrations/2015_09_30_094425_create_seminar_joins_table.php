<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeminarJoinsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seminar_joins', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('event_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->string('email', 100);
            $table->string('telephone', 50);
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('seminar_places')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('seminar_joins');
    }
}
