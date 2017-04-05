<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1491404123ElementsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('elementsets')) {
            Schema::create('elementsets', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('label')->nullable();
                $table->text('description')->nullable();
                $table->string('uri')->nullable();
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', 'fk_9600_project_project_id_elementset')->references('id')->on('projects')->onDelete('cascade');
                
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
        Schema::dropIfExists('elementsets');
    }
}
