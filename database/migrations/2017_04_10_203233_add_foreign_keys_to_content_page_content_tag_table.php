<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContentPageContentTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('content_page_content_tag', function(Blueprint $table)
		{
			$table->foreign('content_tag_id', 'fk_p_27631_27632_contentpag_contenttag')->references('id')->on('content_tags')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('content_page_id', 'fk_p_27632_27631_contenttag_contentpage')->references('id')->on('content_pages')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('content_page_content_tag', function(Blueprint $table)
		{
			$table->dropForeign('fk_p_27631_27632_contentpag_contenttag');
			$table->dropForeign('fk_p_27632_27631_contenttag_contentpage');
		});
	}

}
