<?php

class Create_Notes {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pads', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->timestamps();
			$table->integer('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->boolean('hidden')->default('0');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pads');
	}

}