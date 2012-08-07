<?php

class Create_Checkins {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checkins', function($table) {
		    $table->increments('id');
		    $table->blob('checkintext');
		    $table->integer('user_id');
		    $table->timestamps();  
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}