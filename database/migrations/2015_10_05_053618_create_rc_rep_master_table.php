<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRcRepMasterTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rc_rep_master', function (Blueprint $table) {
            $table->string('rm_entity_id', 2)->nullable();
            $table->string('rm_branch_id', 3)->nullable();
            $table->string('rm_division_id', 2)->nullable();
            $table->string('rm_registration_id', 7)->nullable();
            $table->string('rm_rep_id', 7);
            $table->string('rm_name', 50)->nullable();
            $table->string('rm_short_name', 20)->nullable();
            $table->string('rm_manager_id', 7)->nullable();
            $table->string('rm_recruiter_id', 7)->nullable();
            $table->string('rm_sex', 1)->nullable();
            $table->integer('rm_marital_status')->nullable();
            $table->dateTime('rm_join_date')->nullable();
            $table->dateTime('rm_psk_date')->nullable();
            $table->string('rm_home_address_1', 40)->nullable();
            $table->string('rm_home_address_2', 40)->nullable();
            $table->string('rm_home_address_3', 40)->nullable();
            $table->string('rm_phone_home', 15)->nullable();
            $table->string('rm_kelurahan', 50)->nullable();
            $table->string('rm_rt', 2)->nullable();
            $table->string('rm_rw', 2)->nullable();
            $table->string('rm_zipcode', 15)->nullable();
            $table->string('rm_email_address', 30)->nullable();
            $table->string('rm_company_name', 50)->nullable();
            $table->string('rm_company_address_1', 40)->nullable();
            $table->string('rm_company_address_2', 40)->nullable();
            $table->string('rm_company_address_3', 40)->nullable();
            $table->string('rm_company_phone', 15)->nullable();
            $table->string('rm_mobile_phone', 15)->nullable();
            $table->string('rm_birth_place', 15)->nullable();
            $table->dateTime('rm_birth_date')->nullable();
            $table->integer('rm_religion_id')->nullable();
            $table->string('rm_citizenship', 10)->nullable();
            $table->string('rm_acc_number', 20)->nullable();
            $table->string('rm_account_name', 30)->nullable();
            $table->string('rm_bank_id', 20)->nullable();
            $table->string('rm_identity_no', 30)->nullable();
            $table->integer('rm_last_formal_education')->nullable();
            $table->string('rm_graduated_flag', 1)->nullable();
            $table->string('rm_year_graduated', 4)->nullable();
            $table->integer('rm_language_1')->nullable();
            $table->integer('rm_language_2')->nullable();
            $table->integer('rm_language_3')->nullable();
            $table->string('rm_last_position', 50)->nullable();
            $table->string('rm_customer_id', 7)->nullable();
            $table->string('rm_group', 7)->nullable();
            $table->string('rm_status', 7)->nullable();
            $table->string('rm_current_position', 4);
            $table->dateTime('rm_date_position_change')->nullable();
            $table->string('rm_last_position_level', 4)->nullable();
            $table->decimal('rm_num_rep_recruited', 18, 0)->nullable();
            $table->dateTime('rm_entry_date')->nullable();
            $table->string('rm_entry_user', 10)->nullable();
            $table->string('rm_cwh_deducted', 1)->nullable();
            $table->decimal('rm_cwh_cummulated', 18, 0)->nullable();
            $table->string('rm_active_flag', 1)->nullable();
            $table->string('rm_rep_type_id', 4)->nullable();
            $table->string('rm_rep_txn_flag', 1)->nullable();
            $table->dateTime('rm_maried_date')->nullable();
            $table->dateTime('rm_nabas_date')->nullable();
            $table->string('rm_team', 2)->nullable();
            $table->string('rm_passwd', 50)->nullable();
            $table->dateTime('rm_oct_date')->nullable();
            $table->string('rm_id_link', 7)->nullable();
            $table->string('rm_npwp', 30)->nullable();
            $table->char('rm_cmp_num', 10)->nullable();
            $table->string('rm_nm_Manager', 50)->nullable();
            $table->string('rm_principal', 3)->nullable();
            $table->string('rm_nama_NPWP', 50)->nullable();
            $table->string('rm_OCT_ID', 10)->nullable();
            $table->string('rm_status_position', 20)->nullable();
            $table->string('rm_recruiter_name', 50)->nullable();
            $table->string('rm_epd_name', 50)->nullable();
            $table->string('rm_gepd_name', 50)->nullable();
            $table->dateTime('rm_last_update')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('rc_rep_master');
    }
}
