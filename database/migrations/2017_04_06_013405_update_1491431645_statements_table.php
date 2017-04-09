<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491431645StatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statements', function (Blueprint $table) {
            $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', 'fk_9600_project_project_id_statement')->references('id')->on('projects')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statements', function (Blueprint $table) {
            $table->dropForeign('fk_9600_project_project_id_statement');
            $table->dropIndex('fk_9600_project_project_id_statement');
            $table->dropColumn('project_id');
            
        });

    }
}
