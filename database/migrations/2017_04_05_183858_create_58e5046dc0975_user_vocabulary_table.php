<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58e5046dc0975UserVocabularyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('user_vocabulary')) {
            Schema::create('user_vocabulary', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_9562_27649_vocabulary_user')->references('id')->on('users')->onDelete('cascade');
                $table->integer('vocabulary_id')->unsigned()->nullable();
                $table->foreign('vocabulary_id', 'fk_p_27649_9562_user_vocabulary')->references('id')->on('vocabularies')->onDelete('cascade');
                
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
        Schema::dropIfExists('user_vocabulary');
    }
}
