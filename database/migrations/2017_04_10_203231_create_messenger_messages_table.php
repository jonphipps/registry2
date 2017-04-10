<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessengerMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messenger_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('topic_id')->unsigned()->index('messenger_messages_topic_id_foreign');
			$table->integer('sender_id');
			$table->text('content', 65535);
			$table->timestamp('sent_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('messenger_messages');
	}

}
