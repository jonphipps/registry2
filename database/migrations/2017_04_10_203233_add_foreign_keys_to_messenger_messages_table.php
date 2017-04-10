<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMessengerMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('messenger_messages', function(Blueprint $table)
		{
			$table->foreign('topic_id')->references('id')->on('messenger_topics')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('messenger_messages', function(Blueprint $table)
		{
			$table->dropForeign('messenger_messages_topic_id_foreign');
		});
	}

}
