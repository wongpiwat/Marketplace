<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

    public function up() {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->enum('status',['development','release','stable','obsolate']);
            $table->enum('view_status',['public','private']);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('projects');
    }
}
