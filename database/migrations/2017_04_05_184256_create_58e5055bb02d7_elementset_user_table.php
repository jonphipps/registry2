<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58e5055bb02d7ElementsetUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('elementset_user')) {
            Schema::create('elementset_user', function (Blueprint $table) {
                $table->integer('elementset_id')->unsigned()->nullable();
                $table->foreign('elementset_id', 'fk_p_27651_9562_user_elementset')->references('id')->on('elementsets')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_9562_27651_elementset_user')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('elementset_user');
    }
}
