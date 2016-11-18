<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductPricelistsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product_pricelists', function ($table) {
			$table->increments('id');
			$table->string('code', 50);
			$table->string('desc', 100);
			$table->string('product_code', 50);
			$table->integer('installment_number')->comment('month');
			$table->float('dp_amount', 10)->unsigned()->default(0.00);
			$table->float('installment_amount', 10)->unsigned()->default(0.00)->comment('per month');
			$table->float('total_price', 10)->unsigned()->default(0.00);
			$table->string('sales_unit', 100);
			$table->string('sales_type', 100);
			$table->float('cash_value', 10)->unsigned()->default(0.00);
			$table->float('commission', 10)->unsigned()->default(0.00);
			$table->timestamps();
			$table->foreign('product_id')->references('id')->on('products')
				->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('contract_product_pricelists');
	}
}
