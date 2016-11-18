<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSalesServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sales_services', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->string('email', 50);
            $table->string('name', 100);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('user_sales_services');
    }
}
