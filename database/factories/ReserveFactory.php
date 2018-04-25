<?php

use Faker\Generator as Faker;

$factory->define(App\Reserve::class, function (Faker $faker) {
    $user_ids = App\User::all()->pluck('id')->toArray();
    $market_ids = App\Market::all()->pluck('id')->toArray();
    return [
      'location' => $faker->address,
      'reserved_by'=>$faker->randomElement($user_ids),
      'market_id'=>$faker->randomElement($market_ids),
    ];
});
