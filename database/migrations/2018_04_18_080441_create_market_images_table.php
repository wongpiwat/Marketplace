<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketImagesTable extends Migration {

    public function up() {
        Schema::create('market_images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('path');
            $table->enum(['profile','screenshot']);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('market_images');
    }
}
