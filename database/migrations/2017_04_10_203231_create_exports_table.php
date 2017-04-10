<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('fk_9562_user_user_id_export');
			$table->integer('vocabulary_id')->unsigned()->nullable()->index('fk_27649_vocabulary_vocabulary_id_export');
			$table->integer('elementset_id')->unsigned()->nullable()->index('fk_27651_elementset_elementset_id_export');
			$table->boolean('excude_deprecated')->nullable()->default(1);
			$table->boolean('include_generated')->nullable()->default(1);
			$table->boolean('include_deleted')->nullable()->default(1);
			$table->text('selected_columns', 65535)->nullable();
			$table->string('selected_language')->nullable();
			$table->string('published_english_version')->nullable();
			$table->string('published_language_version')->nullable();
			$table->dateTime('last_vocab_update')->nullable();
			$table->integer('profile_id')->unsigned()->nullable()->index('fk_27657_profile_profile_id_export');
			$table->string('file')->nullable();
			$table->text('map', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exports');
	}

}
