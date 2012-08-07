<?php

class Add_Owner_To_Teams {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::table('teams', function($table)
	  {
	      $table->integer('owner_id');
	  });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
	  Schema::table('teams', function($table)
	  {
			$table->drop_column('owner_id');
		});
	}

}