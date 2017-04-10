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
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('label')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('uri')->nullable();
			$table->integer('project_id')->unsigned()->nullable()->index('fk_9600_project_project_id_vocabulary');
			$table->timestamps();
			$table->softDeletes()->index();
			$table->integer('user_id')->unsigned()->nullable()->index('fk_9562_user_user_id_vocabulary');
			$table->text('json', 65535)->nullable();
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
