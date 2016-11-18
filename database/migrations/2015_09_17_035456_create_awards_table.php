<?php

use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('awards', function ($table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('title_locale_id', 100);
            $table->string('img', 100);
            $table->text('content');
            $table->text('content_locale_id');
            $table->enum('is_publish', ['Y', 'N'])->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('awards');
    }
}
