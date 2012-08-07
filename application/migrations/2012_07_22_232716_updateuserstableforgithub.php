<?php

class Updateuserstableforgithub {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::table('users', function($table)
	  {
	      $table->drop_column('email');
	      $table->drop_column('password');
	      $table->string('token');
	      $table->string('nickname');
	      $table->string('name');
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
			$table->string('email');
			$table->string('password');
			$table->drop_column('token');
			$table->drop_column('nickname');
			$table->drop_column('name');
		});
	}

}