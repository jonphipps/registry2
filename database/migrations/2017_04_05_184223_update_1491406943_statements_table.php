<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491406943StatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statements', function (Blueprint $table) {
            $table->integer('translation_id')->unsigned()->nullable();
                $table->foreign('translation_id', 'fk_27661_translation_translation_id_statement')->references('id')->on('translations')->onDelete('cascade');
                $table->integer('res_id')->unsigned()->nullable();
                $table->foreign('res_id', 'fk_27660_re_res_id_statement')->references('id')->on('res')->onDelete('cascade');
                
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
            $table->dropForeign('fk_27661_translation_translation_id_statement');
            $table->dropIndex('fk_27661_translation_translation_id_statement');
            $table->dropColumn('translation_id');
            $table->dropForeign('fk_27660_re_res_id_statement');
            $table->dropIndex('fk_27660_re_res_id_statement');
            $table->dropColumn('res_id');
            
        });

    }
}
