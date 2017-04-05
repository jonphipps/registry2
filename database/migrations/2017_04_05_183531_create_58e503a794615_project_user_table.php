<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58e503a794615ProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('project_user')) {
            Schema::create('project_user', function (Blueprint $table) {
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', 'fk_p_9600_9562_user_project')->references('id')->on('projects')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_9562_9600_project_user')->references('id')->on('users')->onDelete('cascade');
                
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
        Schema::dropIfExists('project_user');
    }
}
