<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebboardRepliesTable extends Migration {

    public function up()
    {
        Schema::create('webboard_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('reply_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('reply_by')->references('id')->on('webboards');

        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::table('webboard_replies', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['reply_by']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('webboard_replies');
    }
}
