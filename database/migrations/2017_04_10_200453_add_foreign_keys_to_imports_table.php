<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToImportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('imports', function(Blueprint $table)
		{
			$table->foreign('elementset_id')->references('id')->on('elementsets')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('vocabulary_id', '1')->references('id')->on('vocabularies')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('user_id', '2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('imports', function(Blueprint $table)
		{
			$table->dropForeign('imports_elementset_id_foreign');
			$table->dropForeign('1');
			$table->dropForeign('2');
		});
	}

}
