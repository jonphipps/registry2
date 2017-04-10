<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('translations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('res_id')->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
			$table->string('version')->nullable();
			$table->integer('elementset_id')->nullable();
			$table->integer('vocabulary_id')->nullable();
			$table->integer('concept_id')->nullable();
			$table->integer('element_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translations');
	}

}
