<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKpHeaderTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kp_header', function (Blueprint $table) {
            $table->string('skh_so_kp_number', 9);
            $table->dateTime('skh_so_kp_date')->nullable();
            $table->dateTime('skh_lask_update_kp')->nullable();
            $table->string('skh_rep_id', 7)->nullable();
            $table->string('rm_name', 50)->nullable();
            $table->string('scm_customer_name', 40)->nullable();
            $table->decimal('skh_total_inv_amount', 18, 0)->nullable();
            $table->string('skh_so_invoice_number', 8)->nullable();
            $table->dateTime('skh_so_invoice_date')->nullable();
            $table->dateTime('sih_last_update_invoice')->nullable();
            $table->dateTime('skh_lastdate_status_change')->nullable();
            $table->string('skh_remark_activity', 100)->nullable();
            $table->string('skh_status_of_so_kp', 1)->nullable();
            $table->string('skh_status_of_verification', 1)->nullable();
            $table->string('skh_status_of_invoice', 1)->nullable();
            $table->string('skh_status_of_delivery', 1)->nullable();
            $table->string('skh_status_of_dp', 1)->nullable();
            $table->string('skh_entity_id', 2)->nullable();
            $table->string('skh_branch_id', 3)->nullable();
            $table->string('skh_division_id', 2)->nullable();
            $table->string('ot_desc', 50)->nullable();
            $table->string('ks_source', 30)->nullable();
            $table->string('scm_last_order_num', 9)->nullable();
            $table->dateTime('scm_last_order_date')->nullable();
            $table->string('wh_warehouse_id', 5)->nullable();
            $table->string('skh_price_list_id', 5)->nullable();
            $table->string('skh_sales_type', 2)->nullable();
            $table->decimal('skh_no_of_instalments', 4, 0)->nullable();
            $table->float('skh_total_su', 10, 0)->nullable();
            $table->decimal('skh_instalment_amount_per_month', 18, 0)->nullable();
            $table->dateTime('skh_delivery_date')->nullable();
            $table->string('scm_home_phone_num', 12)->nullable();
            $table->string('scm_mobile_phone_num', 12)->nullable();
            $table->string('scm_address1', 50)->nullable();
            $table->string('scm_address2', 50)->nullable();
            $table->string('scm_address3', 50)->nullable();
            $table->string('ssh_status_of_pod', 1)->nullable();
            $table->string('skh_product', 50)->nullable();
            $table->dateTime('ssh_pod_date')->nullable();
            $table->dateTime('skh_last_update')->nullable();
            $table->dateTime('skh_request_delivery_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('kp_header');
    }
}
