<?php

use Illuminate\Database\Migrations\Migration;

class RemoveDefaultAuthTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::drop('password_resets');
        Schema::drop('users');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $migration = new CreateUsersTable();
        $migration->up();

        $migration = new CreatePasswordResetsTable();
        $migration->up();
    }
}
