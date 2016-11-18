<?php

use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up() {
		Schema::create('products', function ($table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->string('code', 50);
			$table->string('name', 100);
			$table->text('short_desc');
			$table->text('short_desc_locale_id');
			$table->text('desc');
			$table->text('desc_locale_id');
			$table->string('img', 100);
			$table->integer('stock');
			$table->decimal('weight', 7, 1)->default(0.0);
			$table->decimal('volume', 7, 1)->default(0.0);
			$table->enum('is_sale', array('Y', 'N'))->default('N');
			$table->enum('is_e_commerce', array('Y', 'N'))->default('N');
			$table->enum('is_populer', array('Y', 'N'))->default('N');
			$table->enum('is_active', array('Y', 'N'))->default('Y');
			$table->timestamps();
			$table->foreign('category_id')->references('id')->on('product_categories')
				->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down() {
		Schema::drop('products');
	}
}
