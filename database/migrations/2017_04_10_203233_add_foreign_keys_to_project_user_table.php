<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProjectUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_user', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_p_9562_9600_project_user')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('project_id', 'fk_p_9600_9562_user_project')->references('id')->on('projects')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('project_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_p_9562_9600_project_user');
			$table->dropForeign('fk_p_9600_9562_user_project');
		});
	}

}
