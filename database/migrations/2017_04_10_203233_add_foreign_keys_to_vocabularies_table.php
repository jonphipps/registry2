<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVocabulariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vocabularies', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_9562_user_user_id_vocabulary')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('project_id', 'fk_9600_project_project_id_vocabulary')->references('id')->on('projects')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vocabularies', function(Blueprint $table)
		{
			$table->dropForeign('fk_9562_user_user_id_vocabulary');
			$table->dropForeign('fk_9600_project_project_id_vocabulary');
		});
	}

}
