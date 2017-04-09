<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1491499967ExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('exports')) {
            Schema::create('exports', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_9562_user_user_id_export')->references('id')->on('users')->onDelete('cascade');
                $table->integer('vocabulary_id')->unsigned()->nullable();
                $table->foreign('vocabulary_id', 'fk_27649_vocabulary_vocabulary_id_export')->references('id')->on('vocabularies')->onDelete('cascade');
                $table->integer('elementset_id')->unsigned()->nullable();
                $table->foreign('elementset_id', 'fk_27651_elementset_elementset_id_export')->references('id')->on('elementsets')->onDelete('cascade');
                $table->tinyInteger('excude_deprecated')->nullable()->default(1);
                $table->tinyInteger('include_generated')->nullable()->default(1);
                $table->tinyInteger('include_deleted')->nullable()->default(1);
                $table->text('selected_columns')->nullable();
                $table->string('selected_language')->nullable();
                $table->string('published_english_version')->nullable();
                $table->string('published_language_version')->nullable();
                $table->datetime('last_vocab_update')->nullable();
                $table->integer('profile_id')->unsigned()->nullable();
                $table->foreign('profile_id', 'fk_27657_profile_profile_id_export')->references('id')->on('profiles')->onDelete('cascade');
                $table->string('file')->nullable();
                $table->text('map')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('exports');
    }
}
