<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('translations', function(Blueprint $table)
		{
			$table->foreign('vocabulary_id', 'fk_27649_vocabulary_vocabulary_id_translation')->references('id')->on('vocabularies')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('elementset_id', 'fk_27651_elementset_elementset_id_translation')->references('id')->on('elementsets')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('element_id', 'fk_27907_element_element_id_translation')->references('id')->on('elements')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('concept_id', 'fk_27908_concept_concept_id_translation')->references('id')->on('concepts')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('translations', function(Blueprint $table)
		{
			$table->dropForeign('fk_27649_vocabulary_vocabulary_id_translation');
			$table->dropForeign('fk_27651_elementset_elementset_id_translation');
			$table->dropForeign('fk_27907_element_element_id_translation');
			$table->dropForeign('fk_27908_concept_concept_id_translation');
		});
	}

}
