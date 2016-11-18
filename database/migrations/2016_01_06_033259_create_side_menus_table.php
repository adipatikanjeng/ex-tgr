<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSideMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_menus', function($table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->string('link_title', 50);
            $table->string('link', 50);
            $table->string('img', 100);
            $table->enum('is_display', ['N', 'Y'])->default('N');
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
        Schema::drop('side_menus');
    }
}
