<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(MarketsTableSeeder::class);
        $this->call(WebboardsTableSeeder::class);
        $this->call(WebboardRepliesSeeder::class);

    }
}
