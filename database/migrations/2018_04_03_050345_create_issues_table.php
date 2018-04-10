<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration {

    public function up() {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('category_id');
            $table->string('summary');
            $table->enum('status',['new','feedback','acknowledged','confirmed','resolved','closed']);
            $table->unsignedInteger('reporter');
            $table->unsignedInteger('assigned_to')->nullable();
            $table->enum('priority',['none', 'low', 'normal', 'high', 'urgent', 'immediate']);
            $table->enum('severity',['feature', 'trivial', 'text', 'tweak', 'minor', 'major', 'crash', 'block']);
            $table->text('description')->nullable();
            $table->text('steps')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('reporter')->references('id')->on('users');
        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::table('issues', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['assigned_to']);
            $table->dropForeign(['reporter']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('issues');
    }
}
