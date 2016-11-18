<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblSalesAchievementTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_sales_achievement', function (Blueprint $table) {
            $table->string('ac_branch', 3)->nullable();
            $table->string('ac_rep_id', 7)->nullable();
            $table->float('ac_PSSU', 10, 0)->nullable();
            $table->float('ac_PSCashValue', 10, 0)->nullable();
            $table->decimal('ac_RICashValue', 38, 0)->nullable();
            $table->string('periode', 6)->nullable();
            $table->float('ac_RISU', 10, 0)->nullable();
            $table->float('ac_MSSU', 10, 0)->nullable();
            $table->decimal('ac_MSCashValue', 38, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('tbl_sales_achievement');
    }
}
