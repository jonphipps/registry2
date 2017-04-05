<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58e5011cc6405ProductProductCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('product_product_category')) {
            Schema::create('product_product_category', function (Blueprint $table) {
                $table->integer('product_id')->unsigned()->nullable();
                $table->foreign('product_id', 'fk_p_27636_27634_productcat_product')->references('id')->on('products')->onDelete('cascade');
                $table->integer('product_category_id')->unsigned()->nullable();
                $table->foreign('product_category_id', 'fk_p_27634_27636_product_productcategory')->references('id')->on('product_categories')->onDelete('cascade');
                
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
        Schema::dropIfExists('product_product_category');
    }
}
