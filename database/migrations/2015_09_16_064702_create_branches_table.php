<?php

use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('branches', function ($table) {
            $table->increments('id');
            $table->string('code', 50);
            $table->string('name', 100);
            $table->decimal('lat', 9, 6);
            $table->decimal('long', 9, 6);
            $table->text('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('branches');
    }
}
