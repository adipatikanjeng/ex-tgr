<?php

use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up() {
		Schema::create('contacts', function ($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('contract_number');
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('telephone', 50);
			$table->string('city', 100);
			$table->string('zip_code', 50);
			$table->integer('subject_id')->unsigned();
			$table->integer('source_id')->unsigned();
			$table->string('optional', 100);
			$table->text('message');
			$table->timestamps();
			$table->foreign('subject_id')->references('id')->on('subjects')
				->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('source_id')->references('id')->on('sources')
				->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')
				->onUpdate('cascade')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down() {
		Schema::drop('contacts');
	}
}
