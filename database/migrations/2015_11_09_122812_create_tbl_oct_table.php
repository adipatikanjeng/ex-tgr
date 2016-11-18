<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblOctTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_oct', function(Blueprint $table)
		{
			$table->string('rm_manager_id', 10)->nullable();
			$table->string('nama_mgr', 10)->nullable();
			$table->string('ro_branch_id', 3)->nullable();
			$table->string('ro_principal', 3)->nullable();
			$table->string('ro_id', 5);
			$table->string('ro_rep_id', 10)->nullable();
			$table->string('ro_rep_name', 5)->nullable();
			$table->date('ro_tgl_oct')->nullable();
			$table->string('ro_nama_peserta', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_oct');
	}

}
