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
            $table->unsignedInteger('reply_to');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('reply_to')->references('id')->on('webboards');

        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::table('webboard_replies', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['reply_to']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('webboard_replies');
    }
}
