<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('location');
          $table->string('start_day');
          $table->string('close_day');
          $table->string('start_time');
          $table->string('close_time');
          $table->string('organizer_name');
          $table->string('contact_name');
          $table->string('email');
          $table->string('phone');
          $table->text('description');
          $table->string('teaser')->nullable();
          $table->unsignedInteger('view');
          $table->unsignedInteger('created_by');
          $table->boolean('is_enabled');
          $table->text('latitude');
          $table->text('longitude');
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('created_by')->references('id')->on('users');
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
        Schema::table('markets', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('markets');
    }
}
