<?php

use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up() {
		Schema::create('contracts', function ($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('branch_id')->unsigned();
			$table->string('contract_number', 50);
			$table->string('name', 100);
			$table->enum('gender', ['Male', 'Female'])->default('Male');
			$table->string('office', 100);
			$table->string('office_address');
			$table->string('floor', 100);
			$table->string('position', 100);
			$table->string('office_telephone', 50);
			$table->string('mobile_phone', 50);
			$table->string('email', 50);
			$table->string('id_card', 100);
			$table->string('file_transfer', 100);
			$table->string('home_address');
			$table->string('home_telephone');
			$table->string('postal_code', 50);
			$table->enum('shipping_address', ['Home', 'Office'])->default('Home');
			$table->enum('receivable_address', ['Home', 'Office'])->default('Home');
			$table->enum('payment_type', ['Cash', 'Credit', 'COD'])->default('Cash');
			$table->integer('credit_total_month');
			$table->integer('pricelist_id')->unsigned()->nullable();
			$table->float('total_investment', 10)->unsigned()->default(0.00);
			$table->float('initial_investment', 10)->unsigned()->default(0.00);
			$table->float('residual_investment', 10)->unsigned()->default(0.00);
			$table->float('month_investment', 10)->unsigned()->default(0.00);
			$table->string('couple_name', 100);
			$table->string('couple_office', 100);
			$table->string('couple_office_address');
			$table->string('couple_position', 100);
			$table->string('couple_telephone', 50);
			$table->string('relatives_name', 100);
			$table->string('relatives_telephone', 100);
			$table->string('relatives_office_address');
			$table->string('home_status', 100);
			$table->string('cc_number', 100);
			$table->string('cc_bank', 100);
			$table->date('cc_valid_date');
			$table->integer('source_id')->unsigned()->nullable();
			$table->enum('status', ['Completed', 'Released', 'Sent to Ho', 'Rejected'])->nullable()->default(null);
			$table->timestamps();
			$table->foreign('pricelist_id')->references('id')->on('product_pricelists')
				->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')
				->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('branch_id')->references('id')->on('branches')
				->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('source_id')->references('id')->on('sources')
				->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down() {
		Schema::drop('contracts');
	}
}
