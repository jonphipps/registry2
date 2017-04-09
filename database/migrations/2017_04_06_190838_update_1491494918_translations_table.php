<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491494918TranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('translations', function (Blueprint $table) {
            $table->integer('concept_id')->unsigned()->nullable();
                $table->foreign('concept_id', 'fk_27908_concept_concept_id_translation')->references('id')->on('concepts')->onDelete('cascade');
                $table->integer('element_id')->unsigned()->nullable();
                $table->foreign('element_id', 'fk_27907_element_element_id_translation')->references('id')->on('elements')->onDelete('cascade');
                
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
            $table->dropForeign('fk_27908_concept_concept_id_translation');
            $table->dropIndex('fk_27908_concept_concept_id_translation');
            $table->dropColumn('concept_id');
            $table->dropForeign('fk_27907_element_element_id_translation');
            $table->dropIndex('fk_27907_element_element_id_translation');
            $table->dropColumn('element_id');
            
        });

    }
}