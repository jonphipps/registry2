<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElementsetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementsets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable();
			$table->string('label')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('uri')->nullable();
			$table->integer('project_id')->unsigned()->nullable()->index('fk_9600_project_project_id_elementset');
			$table->timestamps();
			$table->softDeletes()->index();
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
		Schema::drop('elementsets');
	}

}
