<?php

use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder {

    public function run() {
        factory(App\Issue::class,3)->create();
    }
}
