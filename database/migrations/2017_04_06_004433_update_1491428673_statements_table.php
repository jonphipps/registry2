<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491428673StatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statements', function (Blueprint $table) {
            if(Schema::hasColumn('statements', 'res')) {
                $table->dropForeign('fk_27660_re_res_id_statement');
                $table->dropIndex('fk_27660_re_res_id_statement');
                $table->dropColumn('res_id');
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
        Schema::table('statements', function (Blueprint $table) {
                        $table->integer('res_id')->unsigned()->nullable();
                $table->foreign('res_id', 'fk_27660_re_res_id_statement')->references('id')->on('res')->onDelete('cascade');
                
        });

    }
}
