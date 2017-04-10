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
			$table->integer('id', true);
			$table->text('value')->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
			$table->integer('translation_id')->nullable();
			$table->integer('res_id')->nullable();
			$table->integer('elementset_id')->nullable();
			$table->integer('vocabulary_id')->nullable();
			$table->integer('project_id')->nullable();
			$table->integer('property_id')->nullable();
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
		Schema::drop('statements');
	}

}
