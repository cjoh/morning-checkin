<?php

class Create_Notifications {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->blob('body');
			$table->string('target');
			$table->timestamps();
			$table->boolean('is_hidden');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		schema::drop('notifications');
	}

}