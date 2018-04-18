<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketImagesTable extends Migration {

    public function up() {
        Schema::create('market_images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('path');
            $table->enum('type',['profile','screenshot']);
            $table->unsignedInteger('market_id');
            $table->timestamps();
            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::table('market_images', function (Blueprint $table) {
            $table->dropForeign(['market_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('market_images');
    }
}
