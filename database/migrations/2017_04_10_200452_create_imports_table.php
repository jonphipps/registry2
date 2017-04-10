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
			$table->integer('id', true);
			$table->text('map')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('vocabulary_id')->nullable();
			$table->integer('elementset_id')->nullable();
			$table->string('source_file_name')->nullable();
			$table->string('file_name')->nullable();
			$table->string('file_type')->nullable();
			$table->text('results')->nullable();
			$table->integer('total_processed_count')->nullable();
			$table->integer('error_count')->nullable();
			$table->integer('success_count')->nullable();
			$table->timestamps();
			$table->softDeletes()->index();
			$table->integer('batch_id')->nullable();
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
