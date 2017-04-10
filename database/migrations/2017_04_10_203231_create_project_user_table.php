<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('project_user', function(Blueprint $table)
		{
			$table->integer('project_id')->unsigned()->nullable()->index('fk_p_9600_9562_user_project');
			$table->integer('user_id')->unsigned()->nullable()->index('fk_p_9562_9600_project_user');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_user');
	}

}
