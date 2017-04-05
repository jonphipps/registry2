<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1491406846TranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('translations')) {
            Schema::create('translations', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('res_id')->unsigned()->nullable();
                $table->foreign('res_id', 'fk_27660_re_res_id_translation')->references('id')->on('res')->onDelete('cascade');
                
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
        Schema::dropIfExists('translations');
    }
}