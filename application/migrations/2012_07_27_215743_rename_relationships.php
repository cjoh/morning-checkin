<?php

class Rename_Relationships {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('relationships');
		Schema::create('follows', function($table) {
		    $table->increments('id');
		    $table->integer('user_id');
		    $table->integer('target_user_id');
		    $table->integer('list_id')->nullable();
		    $table->timestamps();  
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->foreign('target_user_id')->references('id')->on('users');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('follows');

	}


}
?>