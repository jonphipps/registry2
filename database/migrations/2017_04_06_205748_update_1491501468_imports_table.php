<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491501468ImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imports', function (Blueprint $table) {
            $table->integer('batch_id')->unsigned()->nullable();
                $table->foreign('batch_id', 'fk_27934_batch_batch_id_import')->references('id')->on('batches')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imports', function (Blueprint $table) {
            $table->dropForeign('fk_27934_batch_batch_id_import');
            $table->dropIndex('fk_27934_batch_batch_id_import');
            $table->dropColumn('batch_id');
            
        });

    }
}
