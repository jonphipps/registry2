<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491404260VocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            if(Schema::hasColumn('vocabularies', 'repo')) {
                $table->dropColumn('repo');
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
                        $table->string('repo')->nullable();
                
        });

    }
}
