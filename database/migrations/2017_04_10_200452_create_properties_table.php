<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('properties', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('label');
			$table->string('uri');
			$table->integer('profile_id')->nullable();
			$table->integer('in_list')->nullable()->default(1);
			$table->integer('in_show')->nullable()->default(1);
			$table->integer('in_edit')->nullable()->default(1);
			$table->integer('in_create')->nullable()->default(1);
			$table->integer('in_rdf')->nullable()->default(1);
			$table->integer('in_xml')->nullable()->default(1);
			$table->string('symmetric_uri')->nullable();
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
		Schema::drop('properties');
	}

}
