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
			$table->foreign('content_tag_id')->references('id')->on('content_tags')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('content_page_id', '1')->references('id')->on('content_pages')->onUpdate('NO ACTION')->onDelete('CASCADE');
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
			$table->dropForeign('content_page_content_tag_content_tag_id_foreign');
			$table->dropForeign('1');
		});
	}

}
