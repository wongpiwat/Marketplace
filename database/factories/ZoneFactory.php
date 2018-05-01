<?php

use Faker\Generator as Faker;

$factory->define(App\Zone::class, function (Faker $faker) {
    $market_ids = App\Market::all()->pluck('id')->toArray();

    return [
        //
        'market_id' => $faker->randomElement($market_ids),
        'name' => $faker->word,
        'price' => $faker->randomNumber,
    ];
});
