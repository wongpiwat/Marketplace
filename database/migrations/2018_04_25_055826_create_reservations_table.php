<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('market_id');
          $table->string('zone');
          $table->unsignedInteger('number');
          $table->unsignedInteger('reserved_by')->nullable();
          $table->boolean('is_paid');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('market_id')->references('id')->on('markets');
          $table->foreign('reserved_by')->references('id')->on('users');
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
        Schema::table('reservations', function (Blueprint $table) {
          $table->dropForeign(['market_id']);
          $table->dropForeign(['reserved_by']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('reservations');
    }
}
