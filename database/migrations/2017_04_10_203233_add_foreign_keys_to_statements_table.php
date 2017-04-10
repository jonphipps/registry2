<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStatementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('statements', function(Blueprint $table)
		{
			$table->foreign('vocabulary_id', 'fk_27649_vocabulary_vocabulary_id_statement')->references('id')->on('vocabularies')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('elementset_id', 'fk_27651_elementset_elementset_id_statement')->references('id')->on('elementsets')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('property_id', 'fk_27659_property_property_id_statement')->references('id')->on('properties')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('translation_id', 'fk_27661_translation_translation_id_statement')->references('id')->on('translations')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('element_id', 'fk_27907_element_element_id_statement')->references('id')->on('elements')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('concept_id', 'fk_27908_concept_concept_id_statement')->references('id')->on('concepts')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('project_id', 'fk_9600_project_project_id_statement')->references('id')->on('projects')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('statements', function(Blueprint $table)
		{
			$table->dropForeign('fk_27649_vocabulary_vocabulary_id_statement');
			$table->dropForeign('fk_27651_elementset_elementset_id_statement');
			$table->dropForeign('fk_27659_property_property_id_statement');
			$table->dropForeign('fk_27661_translation_translation_id_statement');
			$table->dropForeign('fk_27907_element_element_id_statement');
			$table->dropForeign('fk_27908_concept_concept_id_statement');
			$table->dropForeign('fk_9600_project_project_id_statement');
		});
	}

}
