<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessengerTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messenger_topics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('subject');
			$table->integer('sender_id');
			$table->integer('receiver_id');
			$table->dateTime('sent_at')->nullable();
			$table->dateTime('sender_read_at')->nullable();
			$table->dateTime('receiver_read_at')->nullable();
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
		Schema::drop('messenger_topics');
	}

}
