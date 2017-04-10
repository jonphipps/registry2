<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToElementsetUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('elementset_user', function(Blueprint $table)
		{
			$table->foreign('elementset_id', 'fk_p_27651_9562_user_elementset')->references('id')->on('elementsets')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('user_id', 'fk_p_9562_27651_elementset_user')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('elementset_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_p_27651_9562_user_elementset');
			$table->dropForeign('fk_p_9562_27651_elementset_user');
		});
	}

}
