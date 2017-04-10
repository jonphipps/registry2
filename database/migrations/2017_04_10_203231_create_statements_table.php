<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('statements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('value', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
			$table->integer('translation_id')->unsigned()->nullable()->index('fk_27661_translation_translation_id_statement');
			$table->integer('elementset_id')->unsigned()->nullable()->index('fk_27651_elementset_elementset_id_statement');
			$table->integer('vocabulary_id')->unsigned()->nullable()->index('fk_27649_vocabulary_vocabulary_id_statement');
			$table->integer('project_id')->unsigned()->nullable()->index('fk_9600_project_project_id_statement');
			$table->integer('property_id')->unsigned()->nullable()->index('fk_27659_property_property_id_statement');
			$table->integer('concept_id')->unsigned()->nullable()->index('fk_27908_concept_concept_id_statement');
			$table->integer('element_id')->unsigned()->nullable()->index('fk_27907_element_element_id_statement');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('statements');
	}

}
