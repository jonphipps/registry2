<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContentCategoryContentPageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_category_content_page', function(Blueprint $table)
		{
			$table->integer('content_category_id')->unsigned()->nullable()->index('fk_p_27630_27632_contentpag_contentcategory');
			$table->integer('content_page_id')->unsigned()->nullable()->index('fk_p_27632_27630_contentcat_contentpage');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('content_category_content_page');
	}

}
