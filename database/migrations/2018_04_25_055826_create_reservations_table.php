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
          $table->unsignedInteger('zone_id');
          $table->unsignedInteger('number');
          $table->unsignedInteger('reserved_by')->nullable();
          $table->boolean('is_paid');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('zone_id')->references('id')->on('zones');
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
          $table->dropForeign(['zone_id']);
          $table->dropForeign(['reserved_by']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('reservations');
    }
}
