<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToExportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('exports', function(Blueprint $table)
		{
			$table->foreign('profile_id')->references('id')->on('profiles')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('elementset_id', '1')->references('id')->on('elementsets')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('vocabulary_id', '2')->references('id')->on('vocabularies')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('user_id', '3')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exports', function(Blueprint $table)
		{
			$table->dropForeign('exports_profile_id_foreign');
			$table->dropForeign('1');
			$table->dropForeign('2');
			$table->dropForeign('3');
		});
	}

}
