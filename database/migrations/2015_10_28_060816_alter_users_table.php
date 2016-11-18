<?php

use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        \DB::statement('ALTER TABLE `users` ADD COLUMN `remember_token` VARCHAR(255) NULL DEFAULT NULL AFTER `last_name`;');
        \DB::statement('ALTER TABLE `users` ADD COLUMN `activation_code` VARCHAR(255) NULL DEFAULT NULL AFTER `remember_token`;');
        \DB::statement('ALTER TABLE `users` ADD COLUMN `is_active` ENUM("Y","N") NULL DEFAULT "N" AFTER `activation_code`;');
        \DB::statement('ALTER TABLE `users` ADD COLUMN `user_type` ENUM("CUS","EPC", "SS") NULL DEFAULT "N" AFTER `is_active`;');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        \DB::statement('ALTER TABLE users DROP COLUMN remember_token');
        \DB::statement('ALTER TABLE users DROP COLUMN activation_code');
        \DB::statement('ALTER TABLE users DROP COLUMN is_active');
        \DB::statement('ALTER TABLE users DROP COLUMN user_type');
    }
}
