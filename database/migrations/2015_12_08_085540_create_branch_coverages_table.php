<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_coverages', function($table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned()->unique();
            $table->integer('branch_id')->unsigned();
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branches')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('free_shippings');
    }
}
