<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
  $user_ids = App\User::all()->pluck('id')->toArray();
  $market_ids = App\Market::all()->pluck('id')->toArray();

  return [
    'market_id' => $faker->randomElement($market_ids),
    'zone' => $faker->address,
    'number' => $faker->unique()->randomDigit,
    'reserved_by' => $faker->randomElement($user_ids),
    'is_paid' => $faker->randomElement([true, false]),
  ];
});
