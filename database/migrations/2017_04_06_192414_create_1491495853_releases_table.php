<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1491495853ReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('releases')) {
            Schema::create('releases', function (Blueprint $table) {
                $table->increments('id');
                $table->string('sha')->nullable();
                $table->string('tag')->nullable();
                $table->text('notes')->nullable();
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', 'fk_9600_project_project_id_release')->references('id')->on('projects')->onDelete('cascade');
                
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
        Schema::dropIfExists('releases');
    }
}
