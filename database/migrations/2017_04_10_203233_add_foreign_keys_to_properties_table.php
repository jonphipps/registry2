<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('properties', function(Blueprint $table)
		{
			$table->foreign('profile_id', 'fk_27657_profile_profile_id_property')->references('id')->on('profiles')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('properties', function(Blueprint $table)
		{
			$table->dropForeign('fk_27657_profile_profile_id_property');
		});
	}

}
