<?php

use Illuminate\Database\Migrations\Migration;

class MigrationWebarqAdmin extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Create Administrator role with id = 1
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Administrator',
            'slug' => 'admin',
        ]);

        // Setup a new default user credentials
        $credentials = ['email' => 'info@webarq.com', 'password' => 'webarq', 'first_name' => 'John', 'last_name' => 'Doe'];

        // Register the user and activate it
        $user = \Sentinel::register($credentials, true);

        // Assign it to the Administrator role
        Sentinel::findRoleById(1)->users()->attach($user);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Delete the user
        $credentials = ['email' => 'info@webarq.com'];
        Sentinel::findUserByCredentials($credentials)->delete();

        // Delete the Administrator role
        Sentinel::findRoleById(1)->delete();
    }
}
