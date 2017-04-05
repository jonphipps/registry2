<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1491406474ResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('res')) {
            Schema::create('res', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('label')->nullable();
                $table->text('description')->nullable();
                $table->string('uri')->nullable();
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', 'fk_9600_project_project_id_re')->references('id')->on('projects')->onDelete('cascade');
                $table->integer('profile_id')->unsigned()->nullable();
                $table->foreign('profile_id', 'fk_27657_profile_profile_id_re')->references('id')->on('profiles')->onDelete('cascade');
                
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
        Schema::dropIfExists('res');
    }
}
