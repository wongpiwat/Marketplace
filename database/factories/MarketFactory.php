<?php

use Faker\Generator as Faker;

$factory->define(App\Market::class, function (Faker $faker) {
  $user_ids = App\User::all()->pluck('id')->toArray();
    return [
        'name'=>$faker->city,
        'location'=>$faker->address,
        'start_time'=>$faker->time,
        'close_time'=>$faker->time,
        'day'=>$faker->dayOfWeek,
        'description'=>$faker->paragraph,
        'teaser'=>$faker->url,
        'created_by'=>$faker->randomElement($user_ids),
        'organizer_name'=>$faker->company,
        'contact_name'=>$faker->name,
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'view'=>$faker->randomDigitNotNull,
    ];
});
