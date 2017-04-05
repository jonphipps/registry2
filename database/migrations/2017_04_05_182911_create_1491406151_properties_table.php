<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1491406151PropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('properties')) {
            Schema::create('properties', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('label');
                $table->string('uri');
                $table->integer('profile_id')->unsigned()->nullable();
                $table->foreign('profile_id', 'fk_27657_profile_profile_id_property')->references('id')->on('profiles')->onDelete('cascade');
                $table->tinyInteger('in_list')->nullable()->default(1);
                $table->tinyInteger('in_show')->nullable()->default(1);
                $table->tinyInteger('in_edit')->nullable()->default(1);
                $table->tinyInteger('in_create')->nullable()->default(1);
                $table->tinyInteger('in_rdf')->nullable()->default(1);
                $table->tinyInteger('in_xml')->nullable()->default(1);
                $table->string('symmetric_uri')->nullable();
                
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
        Schema::dropIfExists('properties');
    }
}
