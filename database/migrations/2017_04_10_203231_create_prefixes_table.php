<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrefixesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prefixes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('prefix')->nullable();
			$table->string('uri')->nullable();
			$table->integer('rank')->unsigned()->nullable();
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
		Schema::drop('prefixes');
	}

}
