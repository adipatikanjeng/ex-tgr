<?php

use Illuminate\Database\Migrations\Migration;

class CreateRangeDiscountsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('range_discounts', function ($table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->string('code', 50);
			$table->string('desc', 50);
			$table->float('min_amount', 10, 2)->default(0.00);
			$table->float('max_amount', 10, 2)->default(0.00);
			$table->integer('discount')->default(0);
			$table->enum('discount_type', ['RPH', 'PSG'])->nullable()->default(null);
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
		Schema::drop('range_discounts');
	}
}
