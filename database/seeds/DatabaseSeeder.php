<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MarketsTableSeeder::class);
        // $this->call(ZonesTableSeeder::class);
        // $this->call(ReservationsTableSeeder::class);
        // $this->call(CheckInsTableSeeder::class);
        $this->call(MarketImagesTableSeeder::class);
        $this->call(WebboardsTableSeeder::class);
        // $this->call(WebboardReplysTableSeeder::class);
        // $this->call(LogsTableSeeder::class);
        $this->call(FeedbacksTableSeeder::class);
    }
}
