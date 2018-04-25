<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webboards', function (Blueprint $table) {
          $table->increments('id');
          $table->string('topic');
          $table->text('details');
          $table->unsignedInteger('created_by');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('webboards', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('webboards');
        Schema::dropIfExists('webboards');
    }
}
