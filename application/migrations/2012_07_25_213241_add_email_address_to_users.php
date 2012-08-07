<?php

class Add_Email_Address_To_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::table('users', function($table)
	  {
	      $table->string('email');
	  });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::table('users', function($table)
	  {
	      $table->drop_column('email');
	  });
	}

}