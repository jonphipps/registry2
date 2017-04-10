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
			$table->foreign('vocabulary_id', 'fk_27649_vocabulary_vocabulary_id_export')->references('id')->on('vocabularies')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('elementset_id', 'fk_27651_elementset_elementset_id_export')->references('id')->on('elementsets')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('profile_id', 'fk_27657_profile_profile_id_export')->references('id')->on('profiles')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id', 'fk_9562_user_user_id_export')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
			$table->dropForeign('fk_27649_vocabulary_vocabulary_id_export');
			$table->dropForeign('fk_27651_elementset_elementset_id_export');
			$table->dropForeign('fk_27657_profile_profile_id_export');
			$table->dropForeign('fk_9562_user_user_id_export');
		});
	}

}
