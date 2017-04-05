<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58e500f88a5bcContentPageContentTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('content_page_content_tag')) {
            Schema::create('content_page_content_tag', function (Blueprint $table) {
                $table->integer('content_page_id')->unsigned()->nullable();
                $table->foreign('content_page_id', 'fk_p_27632_27631_contenttag_contentpage')->references('id')->on('content_pages')->onDelete('cascade');
                $table->integer('content_tag_id')->unsigned()->nullable();
                $table->foreign('content_tag_id', 'fk_p_27631_27632_contentpag_contenttag')->references('id')->on('content_tags')->onDelete('cascade');
                
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
        Schema::dropIfExists('content_page_content_tag');
    }
}
