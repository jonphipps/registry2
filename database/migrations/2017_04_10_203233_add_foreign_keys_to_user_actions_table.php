<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_actions', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_9562_user_user_id_user_action')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_actions', function(Blueprint $table)
		{
			$table->dropForeign('fk_9562_user_user_id_user_action');
		});
	}

}
