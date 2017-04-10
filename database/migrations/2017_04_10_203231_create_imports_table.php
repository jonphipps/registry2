<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('map', 65535)->nullable();
			$table->integer('user_id')->unsigned()->nullable()->index('fk_9562_user_user_id_import');
			$table->integer('vocabulary_id')->unsigned()->nullable()->index('fk_27649_vocabulary_vocabulary_id_import');
			$table->integer('elementset_id')->unsigned()->nullable()->index('fk_27651_elementset_elementset_id_import');
			$table->string('source_file_name')->nullable();
			$table->string('file_name')->nullable();
			$table->string('file_type')->nullable();
			$table->text('results', 65535)->nullable();
			$table->integer('total_processed_count')->nullable();
			$table->integer('error_count')->nullable();
			$table->integer('success_count')->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
			$table->integer('batch_id')->unsigned()->nullable()->index('fk_27934_batch_batch_id_import');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imports');
	}

}
