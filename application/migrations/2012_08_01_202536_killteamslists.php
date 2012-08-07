<?php

class Killteamslists {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('teams');
		Schema::drop('team_user');
		Schema::drop('lists');
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('teams', function($table)
		{
	    $table->increments('id');
	    $table->string('name');
	    $table->integer('owner_id');
	    $table->timestamps();
		});

		Schema::create('team_user', function($table)
		{
		$table->increments('id');
	    $table->integer('team_id');
	    $table->integer('user_id');
	    $table->timestamps();
		});

		Schema::create('lists', function($table) {
		    $table->increments('id');
		    $table->integer('user_id');
		    $table->string('name',100);
		    $table->timestamps();
		    $table->foreign('user_id')->references('id')->on('users');
		});

	}

}