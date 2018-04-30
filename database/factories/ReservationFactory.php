<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
  $user_ids = App\User::all()->pluck('id')->toArray();
  $zone_ids = App\Zone::all()->pluck('id')->toArray();

  return [
    'zone_id' => $faker->randomElement($zone_ids),
    'number' => $faker->unique()->randomDigit,
    'reserved_by' => $faker->randomElement($user_ids),
    'is_paid' => $faker->randomElement([true, false]),
  ];
});
