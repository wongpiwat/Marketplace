<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder {

    public function run() {
        factory(App\Log::class,10)->create();
    }
}
