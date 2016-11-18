<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblSlipCommissionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_slip_commission', function (Blueprint $table) {
            $table->string('rp_branch_id', 3);
            $table->string('rp_rep_id', 8);
            $table->string('rp_name', 50)->nullable();
            $table->string('rp_position', 4);
            $table->string('rp_status', 20)->nullable();
            $table->string('Level', 27)->nullable();
            $table->string('rp_period_year', 4)->nullable();
            $table->string('rp_period_month', 2)->nullable();
            $table->string('rm_acc_number', 20)->nullable();
            $table->string('rp_code', 5);
            $table->string('rp_slip', 9);
            $table->string('rp_no_invoice', 10)->nullable();
            $table->dateTime('sih_so_invoice_date')->nullable();
            $table->string('sih_so_kp_number', 9)->nullable();
            $table->dateTime('sih_so_kp_date')->nullable();
            $table->decimal('rp_gross', 22, 4)->nullable();
            $table->decimal('rp_tax', 12)->nullable();
            $table->decimal('rp_net', 23, 4)->nullable();
            $table->dateTime('rp_date_paid')->nullable();
            $table->string('rp_remarks', 50)->nullable();
            $table->integer('rp_su')->nullable();
            $table->string('rp_nama_cust', 50)->nullable();
            $table->float('rp_cashvalue', 10, 0)->nullable();
            $table->string('rp_period', 6)->nullable();
            $table->decimal('rp_cwh', 22, 4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('tbl_slip_commission');
    }
}
