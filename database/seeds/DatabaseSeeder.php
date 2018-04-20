<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        $this->call(UsersTableSeeder::class);
<<<<<<< HEAD
        $this->call(MarketsTableSeeder::class);
        $this->call(WebboardsTableSeeder::class);
=======
      
>>>>>>> fe16a7011818d0e5e149b49b8a885ecba64bd123

    }
}
