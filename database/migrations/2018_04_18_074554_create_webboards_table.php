<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebboardsTable extends Migration {

    public function up()
    {
        Schema::create('webboards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->text('details');
            $table->unsignedInteger('created_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::table('webboards', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('webboards');
    }
}
