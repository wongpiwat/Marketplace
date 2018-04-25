<?php

use Illuminate\Database\Seeder;

class WebboardReplysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\WebboardReply::class, 9)->create();
    }
}
