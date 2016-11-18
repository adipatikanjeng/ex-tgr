<?php

use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customers', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name', 100);
            $table->string('address');
            $table->integer('city_id')->unsigned();
            $table->enum('gender', ['M', 'F'])->default(null);
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('telephone');
            $table->enum('merital_status', ['Married', 'Single']);
            $table->enum('religion', ['Islam', 'Katolik', 'Protestan', 'Budha', 'Hindu', 'Konghucu'])->default(null);
            $table->string('id_number')->comment('KTP');
            $table->string('zip_code', 5);
            $table->string('tax_number', 50 );
            $table->enum('citizen', ['WNI', 'WNA'])->default('WNI');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')
            ->onUpdate('cascade')->onDelete('cascade');
        });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
