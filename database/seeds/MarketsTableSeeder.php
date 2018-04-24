<?php

use Illuminate\Database\Seeder;

class MarketsTableSeeder extends Seeder {

    public function run() {

        factory(App\Market::class,10)->create();
        
    }
}
