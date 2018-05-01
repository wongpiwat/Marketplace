<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verify_users', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->string('token');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
          $table->softDeletes();
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
        Schema::table('verify_users', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('verify_users');
    }
}
