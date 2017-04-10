<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('label')->nullable();
			$table->string('repo')->nullable();
			$table->text('description', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
			$table->boolean('is_private')->nullable()->default(0);
			$table->text('license', 65535)->nullable();
			$table->string('url')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
