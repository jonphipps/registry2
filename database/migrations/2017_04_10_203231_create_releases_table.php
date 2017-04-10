<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReleasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('releases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sha')->nullable();
			$table->string('tag')->nullable();
			$table->text('notes', 65535)->nullable();
			$table->integer('project_id')->unsigned()->nullable()->index('fk_9600_project_project_id_release');
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
		Schema::drop('releases');
	}

}
