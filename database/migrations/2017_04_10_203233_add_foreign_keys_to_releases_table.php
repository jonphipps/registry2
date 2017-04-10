<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReleasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('releases', function(Blueprint $table)
		{
			$table->foreign('project_id', 'fk_9600_project_project_id_release')->references('id')->on('projects')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('releases', function(Blueprint $table)
		{
			$table->dropForeign('fk_9600_project_project_id_release');
		});
	}

}
