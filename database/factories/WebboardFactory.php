<?php

use Faker\Generator as Faker;

$factory->define(App\Webboard::class, function (Faker $faker) {
    $user_ids = App\User::all()->pluck('id')->toArray();
    $market_ids = App\Market::all()->pluck('id')->toArray();
    return [
        //
        'topic' => $faker->word,
        'details' => $faker->text,
        'type' => $faker->randomElement(['general', 'problems', 'markets']),
        'created_by' => $faker->randomElement($user_ids),
        'market_id' => $faker->randomElement($market_ids),
    ];
});
