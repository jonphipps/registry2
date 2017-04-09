<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491432686StatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statements', function (Blueprint $table) {
            $table->integer('property_id')->unsigned()->nullable();
                $table->foreign('property_id', 'fk_27659_property_property_id_statement')->references('id')->on('properties')->onDelete('cascade');
                
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
            $table->dropForeign('fk_27659_property_property_id_statement');
            $table->dropIndex('fk_27659_property_property_id_statement');
            $table->dropColumn('property_id');
            
        });

    }
}
