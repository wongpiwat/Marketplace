<?php

use Illuminate\Database\Seeder;

class ReservesTableSeeder extends Seeder {

    public function run() {
        factory(App\Reserve::class,10)->create();
    }
}
