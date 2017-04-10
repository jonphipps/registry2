<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentPageContentTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_page_content_tag', function(Blueprint $table)
		{
			$table->integer('content_page_id')->unsigned()->nullable()->index('fk_p_27632_27631_contenttag_contentpage');
			$table->integer('content_tag_id')->unsigned()->nullable()->index('fk_p_27631_27632_contentpag_contenttag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('content_page_content_tag');
	}

}
