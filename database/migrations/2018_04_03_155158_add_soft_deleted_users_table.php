<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletedUsersTable extends Migration {

    public function up() {
        Schema::table('users', function (Blueprint $table) {
            // เป็น ::table ใช้ในการ alter table
            $table->softDeletes();
        });
    }

    public function down() {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
    }
}
