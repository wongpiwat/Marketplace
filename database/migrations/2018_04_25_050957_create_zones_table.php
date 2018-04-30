<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('market_id');
            $table->string('name');
            $table->unsignedInteger('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('market_id')->references('id')->on('markets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::enableForeignKeyConstraints();
      Schema::table('zones', function (Blueprint $table) {
        $table->dropForeign(['market_id']);
      });
      Schema::disableForeignKeyConstraints();
      Schema::dropIfExists('zones');
    }
}
