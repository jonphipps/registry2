<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserVocabularyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_vocabulary', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned()->nullable()->index('fk_p_9562_27649_vocabulary_user');
			$table->integer('vocabulary_id')->unsigned()->nullable()->index('fk_p_27649_9562_user_vocabulary');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_vocabulary');
	}

}
