<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Update1491427903TranslationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('translations',
        function (Blueprint $table) {
          $table->string('version')->nullable();

        });

  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('translations',
        function (Blueprint $table) {
          $table->dropColumn('version');

        });

  }
}
