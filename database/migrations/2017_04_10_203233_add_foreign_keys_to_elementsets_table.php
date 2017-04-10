<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToElementsetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('elementsets', function(Blueprint $table)
		{
			$table->foreign('project_id', 'fk_9600_project_project_id_elementset')->references('id')->on('projects')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('elementsets', function(Blueprint $table)
		{
			$table->dropForeign('fk_9600_project_project_id_elementset');
		});
	}

}
