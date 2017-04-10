<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVocabulariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vocabularies', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->string('label')->nullable();
			$table->text('description')->nullable();
			$table->string('uri')->nullable();
			$table->integer('project_id')->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
			$table->integer('user_id')->nullable();
			$table->text('json')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vocabularies');
	}

}
