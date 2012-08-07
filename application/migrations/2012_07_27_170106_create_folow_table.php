<?php

class Create_Folow_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationships', function($table) {
		    $table->increments('id');
		    $table->integer('user_id');
		    $table->integer('target_user_id');
		    $table->integer('list_id')->nullable();
		    $table->timestamps();  
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->foreign('target_user_id')->references('id')->on('users');
		});
		Schema::create('lists', function($table) {
		    $table->increments('id');
		    $table->integer('user_id');
		    $table->string('name',100);
		    $table->timestamps();
		    $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		schema::drop('relationships');
		schema::drop('lists');

	}

}