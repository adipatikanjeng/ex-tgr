<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('event_comments', function ($table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->enum('is_display', ['N', 'Y'])->default('N');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('event_comments');
    }
}
