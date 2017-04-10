<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContentCategoryContentPageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('content_category_content_page', function(Blueprint $table)
		{
			$table->foreign('content_category_id', 'fk_p_27630_27632_contentpag_contentcategory')->references('id')->on('content_categories')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('content_page_id', 'fk_p_27632_27630_contentcat_contentpage')->references('id')->on('content_pages')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('content_category_content_page', function(Blueprint $table)
		{
			$table->dropForeign('fk_p_27630_27632_contentpag_contentcategory');
			$table->dropForeign('fk_p_27632_27630_contentcat_contentpage');
		});
	}

}
