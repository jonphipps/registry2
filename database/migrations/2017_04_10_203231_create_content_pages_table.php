<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('page_text', 65535)->nullable();
			$table->text('excerpt', 65535)->nullable();
			$table->string('featured_image')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('content_pages');
	}

}
