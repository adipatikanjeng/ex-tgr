<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolumeClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volume_classes', function($table) {
            $table->increments('id');
            $table->decimal('from', 7,1)->default(0.0)->comment('cm');
            $table->decimal('to', 7,1)->default(0.0)->comment('cm');
            $table->float('cost', 10,2)->default(0.00);
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
        Schema::drop('volume_classes');
    }
}
