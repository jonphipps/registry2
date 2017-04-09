<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491432465VocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            if(Schema::hasColumn('vocabularies', 'user')) {
                $table->dropForeign('fk_9562_user_user_id_vocabulary');
                $table->dropIndex('fk_9562_user_user_id_vocabulary');
                $table->dropColumn('user_id');
            }
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
                        $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_9562_user_user_id_vocabulary')->references('id')->on('users')->onDelete('cascade');
                
        });

    }
}
