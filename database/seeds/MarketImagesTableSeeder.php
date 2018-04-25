<?php

use Illuminate\Database\Seeder;

class MarketImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\MarketImage::class, 10)->create();
    }
}
