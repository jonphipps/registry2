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

        });

    }
}
