<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1491501237ImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('imports')) {
            Schema::create('imports', function (Blueprint $table) {
                $table->increments('id');
                $table->text('map')->nullable();
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_9562_user_user_id_import')->references('id')->on('users')->onDelete('cascade');
                $table->integer('vocabulary_id')->unsigned()->nullable();
                $table->foreign('vocabulary_id', 'fk_27649_vocabulary_vocabulary_id_import')->references('id')->on('vocabularies')->onDelete('cascade');
                $table->integer('elementset_id')->unsigned()->nullable();
                $table->foreign('elementset_id', 'fk_27651_elementset_elementset_id_import')->references('id')->on('elementsets')->onDelete('cascade');
                $table->string('source_file_name')->nullable();
                $table->string('file_name')->nullable();
                $table->string('file_type')->nullable();
                $table->text('results')->nullable();
                $table->integer('total_processed_count')->nullable();
                $table->integer('error_count')->nullable();
                $table->integer('success_count')->nullable();
                
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
        Schema::dropIfExists('imports');
    }
}
