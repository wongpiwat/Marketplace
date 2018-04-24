<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration {

    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->unsignedInteger('reserved_by');
            $table->unsignedInteger('market_id');
            $table->timestamps();
            $table->foreign('reserved_by')->references('id')->on('users');
            $table->foreign('market_id')->references('id')->on('markets');
        });
    }
    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::table('reserves', function (Blueprint $table) {
            $table->dropForeign(['reserved_by']);
            $table->dropForeign(['market_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('reserves');
    }
}
