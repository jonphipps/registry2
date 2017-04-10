<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserVocabularyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_vocabulary', function(Blueprint $table)
		{
			$table->foreign('vocabulary_id', 'fk_p_27649_9562_user_vocabulary')->references('id')->on('vocabularies')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id', 'fk_p_9562_27649_vocabulary_user')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_vocabulary', function(Blueprint $table)
		{
			$table->dropForeign('fk_p_27649_9562_user_vocabulary');
			$table->dropForeign('fk_p_9562_27649_vocabulary_user');
		});
	}

}
