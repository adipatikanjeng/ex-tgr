<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsrActivityCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csr_activity_comments', function ($table) {
            $table->increments('id');
            $table->integer('csr_activity_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->enum('is_display', ['N', 'Y'])->default('N');
            $table->timestamps();
            $table->foreign('csr_activity_id')->references('id')->on('articles')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::drop('csr_activity_comments');
    }
}
