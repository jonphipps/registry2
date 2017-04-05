<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58e50e8a15478ReUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('re_user')) {
            Schema::create('re_user', function (Blueprint $table) {
                $table->integer('re_id')->unsigned()->nullable();
                $table->foreign('re_id', 'fk_p_27660_9562_user_re')->references('id')->on('res')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_9562_27660_re_user')->references('id')->on('users')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('re_user');
    }
}
