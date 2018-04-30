<?php

use Faker\Generator as Faker;

$factory->define(App\MarketImage::class, function (Faker $faker) {
    $market_ids = App\Market::all()->pluck('id')->toArray();

    return [
        //
        'market_id' => $faker->randomElement($market_ids),
        'path' => $faker->url,
        'type' => $faker->randomElement(['layout', 'screenshot']),
    ];
});
