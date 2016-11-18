<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductPricelistSettings extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product_pricelist_settings', function ($table) {
			$table->increments('id');
			$table->string('pricelist_code');
			$table->date('start_date');
			$table->date('end_date');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('product_pricelist_settings');
	}
}
