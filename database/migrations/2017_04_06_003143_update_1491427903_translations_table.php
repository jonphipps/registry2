<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491427903TranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('translations', function (Blueprint $table) {
            if(Schema::hasColumn('translations', 'res')) {
                $table->dropForeign('fk_27660_re_res_id_translation');
                $table->dropIndex('fk_27660_re_res_id_translation');
                $table->dropColumn('res_id');
            }
            
        });
Schema::table('translations', function (Blueprint $table) {
            $table->string('version')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('translations', function (Blueprint $table) {
            $table->dropColumn('version');
            
        });
Schema::table('translations', function (Blueprint $table) {
                        $table->integer('res_id')->unsigned()->nullable();
                $table->foreign('res_id', 'fk_27660_re_res_id_translation')->references('id')->on('res')->onDelete('cascade');
                
        });

    }
}
