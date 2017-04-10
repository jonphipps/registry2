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
			$table->foreign('vocabulary_id', 'fk_27649_vocabulary_vocabulary_id_import')->references('id')->on('vocabularies')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('elementset_id', 'fk_27651_elementset_elementset_id_import')->references('id')->on('elementsets')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('batch_id', 'fk_27934_batch_batch_id_import')->references('id')->on('batches')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id', 'fk_9562_user_user_id_import')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
			$table->dropForeign('fk_27649_vocabulary_vocabulary_id_import');
			$table->dropForeign('fk_27651_elementset_elementset_id_import');
			$table->dropForeign('fk_27934_batch_batch_id_import');
			$table->dropForeign('fk_9562_user_user_id_import');
		});
	}

}
