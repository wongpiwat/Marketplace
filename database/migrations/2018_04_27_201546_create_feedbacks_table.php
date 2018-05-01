<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->text('comment');
            $table->unsignedInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::enableForeignKeyConstraints();
      Schema::table('feedbacks', function (Blueprint $table) {
          $table->dropForeign(['created_by']);
      });
      Schema::disableForeignKeyConstraints();
      Schema::dropIfExists('feedbacks');
    }
}
