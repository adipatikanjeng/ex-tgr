<?php

use Illuminate\Database\Migrations\Migration;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('headers', function ($table) {
            $table->increments('id');
            $table->string('img', 100);
            $table->string('code', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('headers');
    }
}
