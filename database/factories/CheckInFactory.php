<?php

use Faker\Generator as Faker;

$factory->define(App\CheckIn::class, function (Faker $faker) {
  $reservations = App\Reservation::all()->pluck('id')->toArray();
    return [
        //
        'reservation_id' => $faker->randomElement($reservations),
        'dateTime' => $faker->dateTime,
    ];
});
