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
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes()->index();
			$table->string('version')->nullable();
			$table->integer('elementset_id')->unsigned()->nullable()->index('fk_27651_elementset_elementset_id_translation');
			$table->integer('vocabulary_id')->unsigned()->nullable()->index('fk_27649_vocabulary_vocabulary_id_translation');
			$table->integer('concept_id')->unsigned()->nullable()->index('fk_27908_concept_concept_id_translation');
			$table->integer('element_id')->unsigned()->nullable()->index('fk_27907_element_element_id_translation');
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
