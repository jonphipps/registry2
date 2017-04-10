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
			$table->foreign('vocabulary_id')->references('id')->on('vocabularies')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('user_id', '1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
			$table->dropForeign('user_vocabulary_vocabulary_id_foreign');
			$table->dropForeign('1');
		});
	}

}
