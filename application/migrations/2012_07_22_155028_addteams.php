<?php

class Addteams {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function($table)
		{
	    $table->increments('id');
	    $table->string('name');
	    
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
		Schema::drop('teams');
	}

}