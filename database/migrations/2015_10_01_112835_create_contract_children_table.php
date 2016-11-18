<?php

use Illuminate\Database\Migrations\Migration;

class CreateContractChildrenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contract_children', function ($table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned();
            $table->string('name', 100);
            $table->string('school');
            $table->date('date_of_birth');
            $table->timestamps();
            $table->foreign('contract_id')->references('id')->on('contracts')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('contract_children');
    }
}
