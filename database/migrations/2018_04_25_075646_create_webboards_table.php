<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webboards', function (Blueprint $table) {
          $table->increments('id');
          $table->string('topic');
          $table->enum('type', ['general', 'problems', 'markets']);
          $table->text('details');
          $table->unsignedInteger('created_by');
          $table->unsignedInteger('market_id')->nullable();
          $table->timestamps();
          $table->softDeletes();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('market_id')->references('id')->on('markets');

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
        Schema::table('webboards', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['market_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('webboards');
        Schema::dropIfExists('webboards');
    }
}
