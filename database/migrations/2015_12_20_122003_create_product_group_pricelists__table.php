<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductGroupPricelistsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product_group_pricelists', function ($table) {
			$table->increments('id');
			$table->string('code', 50);
			$table->string('desc', 100);
			$table->integer('product_sequence_number');
			$table->string('line_type', 50);
			$table->integer('product_id')->unsigned();
			$table->integer('product_quantity');
			$table->integer('credit_installment_number');
			$table->float('cash_investation_amount', 10, 2)->default(0.00);
			$table->float('credit_investation_amount', 10, 2)->default(0.00);
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
		Schema::drop('product_group_pricelists');
	}
}
