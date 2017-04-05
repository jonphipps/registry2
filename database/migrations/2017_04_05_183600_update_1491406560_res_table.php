<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491406560ResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('res', function (Blueprint $table) {
            $table->text('json')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('res', function (Blueprint $table) {
            $table->dropColumn('json');
            
        });

    }
}
