<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    public function up() {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable();
            $table->string('name');
            $table->unsignedInteger('assign_to')->nullable();
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('assign_to')->references('id')->on('users');
        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        // Schema::dropForeign(['project_id','assign_to']);
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['assign_to']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('categories');
    }
}
