<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsrActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csr_activities', function ($table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('name_locale_id', 100);
            $table->string('short_desc');
            $table->string('short_desc_locale_id');
            $table->text('desc');
            $table->text('desc_locale_id');
            $table->date('publish_date');
            $table->string('img');
            $table->integer('order');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('csr_activities');
    }
}
