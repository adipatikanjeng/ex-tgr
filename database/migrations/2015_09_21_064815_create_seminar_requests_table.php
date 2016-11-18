<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeminarRequestsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('seminar_requests', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('city', 100);
            $table->string('telephone', 50);
            $table->integer('topic_id')->unsigned();
            $table->timestamps();
            $table->foreign('topic_id')->references('id')->on('seminar_topics')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('seminar_requests');
    }
}
