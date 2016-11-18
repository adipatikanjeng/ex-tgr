<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblKomisiKpTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_komisi_kp', function (Blueprint $table) {
            $table->string('rp_branch_id', 3)->nullable();
            $table->string('rp_rep_id', 8)->nullable();
            $table->string('rp_commission_slip_no', 9)->nullable();
            $table->string('rp_paid', 1)->nullable();
            $table->string('rp_commission_code', 5)->nullable();
            $table->decimal('rp_commission_gross_amount', 12)->nullable();
            $table->string('rp_period_year', 4)->nullable();
            $table->string('rp_period_month', 2)->nullable();
            $table->decimal('rp_tax_amount', 12)->nullable();
            $table->decimal('rp_paid_amount', 12)->nullable();
            $table->decimal('rp_commission_to_be_paid_amount', 12)->nullable();
            $table->string('rp_period_status', 1)->nullable();
            $table->string('rp_kp_number', 500)->nullable();
            $table->string('rp_periode', 6)->nullable();
            $table->date('rp_last_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('tbl_komisi_kp');
    }
}
