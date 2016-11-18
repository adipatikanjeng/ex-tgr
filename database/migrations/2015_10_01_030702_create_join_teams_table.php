<?php

use Illuminate\Database\Migrations\Migration;

class CreateJoinTeamsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('join_teams', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('city', 100);
            $table->string('telephone', 50);
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('join_teams');
    }
}
