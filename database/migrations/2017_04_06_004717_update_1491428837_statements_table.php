<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491428837StatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statements', function (Blueprint $table) {
            $table->integer('elementset_id')->unsigned()->nullable();
                $table->foreign('elementset_id', 'fk_27651_elementset_elementset_id_statement')->references('id')->on('elementsets')->onDelete('cascade');
                $table->integer('vocabulary_id')->unsigned()->nullable();
                $table->foreign('vocabulary_id', 'fk_27649_vocabulary_vocabulary_id_statement')->references('id')->on('vocabularies')->onDelete('cascade');
                
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
            $table->dropForeign('fk_27651_elementset_elementset_id_statement');
            $table->dropIndex('fk_27651_elementset_elementset_id_statement');
            $table->dropColumn('elementset_id');
            $table->dropForeign('fk_27649_vocabulary_vocabulary_id_statement');
            $table->dropIndex('fk_27649_vocabulary_vocabulary_id_statement');
            $table->dropColumn('vocabulary_id');
            
        });

    }
}
