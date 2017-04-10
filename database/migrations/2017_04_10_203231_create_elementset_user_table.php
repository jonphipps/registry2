<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateElementsetUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementset_user', function(Blueprint $table)
		{
			$table->integer('elementset_id')->unsigned()->nullable()->index('fk_p_27651_9562_user_elementset');
			$table->integer('user_id')->unsigned()->nullable()->index('fk_p_9562_27651_elementset_user');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('elementset_user');
	}

}
