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
			$table->foreign('content_page_id')->references('id')->on('content_pages')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('content_category_id', '1')->references('id')->on('content_categories')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
			$table->dropForeign('content_category_content_page_content_page_id_foreign');
			$table->dropForeign('1');
		});
	}

}
