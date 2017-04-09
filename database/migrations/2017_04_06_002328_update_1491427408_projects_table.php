<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1491427408ProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if(Schema::hasColumn('projects', 'uri')) {
                $table->dropColumn('uri');
            }
            
        });
Schema::table('projects', function (Blueprint $table) {
            $table->string('url')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('url');
            
        });
Schema::table('projects', function (Blueprint $table) {
                        $table->string('uri')->nullable();
                
        });

    }
}
