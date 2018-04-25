<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebboardRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webboard_replies', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('reply_to');
          $table->text('comment');
          $table->unsignedInteger('created_by');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('reply_to')->references('id')->on('webboards');
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
        Schema::table('webboard_replies', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['reply_to']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('webboard_replies');
    }
}
