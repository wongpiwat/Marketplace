<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration {

    public function up() {
        Schema::create('markets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->string('start_time');
            $table->string('close_time');
            $table->string('date');
            $table->text('details')->nullable();
            $table->string('teaser')->nullable();
            $table->unsignedInteger('images');
            $table->unsignedInteger('created_by');
            $table->timestamps();
            $table->foreign('images')->references('id')->on('market_images');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::table('markets', function (Blueprint $table) {
            $table->dropForeign(['images']);
            $table->dropForeign(['created_by']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('markets');
    }
}
