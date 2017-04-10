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
			$table->integer('id', true);
			$table->integer('user_id')->nullable();
			$table->integer('vocabulary_id')->nullable();
			$table->integer('elementset_id')->nullable();
			$table->integer('excude_deprecated')->nullable()->default(1);
			$table->integer('include_generated')->nullable()->default(1);
			$table->integer('include_deleted')->nullable()->default(1);
			$table->text('selected_columns')->nullable();
			$table->string('selected_language')->nullable();
			$table->string('published_english_version')->nullable();
			$table->string('published_language_version')->nullable();
			$table->dateTime('last_vocab_update')->nullable();
			$table->integer('profile_id')->nullable();
			$table->string('file')->nullable();
			$table->text('map')->nullable();
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
