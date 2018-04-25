<?php

use Illuminate\Database\Seeder;

class WebboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Webboard::class, 9)->create();
    }
}
