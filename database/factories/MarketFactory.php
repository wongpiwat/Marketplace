<?php

use Faker\Generator as Faker;

$factory->define(App\Market::class, function (Faker $faker) {
  $user_ids = App\User::where('type', 'administrator')->orWhere('type', 'organizer')->pluck('id')->toArray();

  return [
      'name'=>$faker->city,
      'location'=>$faker->address,
      'start_day'=>$faker->date,
      'close_day'=>$faker->date,
      'start_time'=>$faker->time,
      'close_time'=>$faker->time,
      'organizer_name'=>$faker->company,
      'contact_name'=>$faker->name,
      'email'=>$faker->email,
      'phone'=>$faker->phoneNumber,
      'description'=>$faker->paragraph,
      'teaser'=>$faker->url,
      'view'=>$faker->randomDigit,
      'created_by'=>$faker->randomElement($user_ids),
      'is_enabled' => $faker->boolean(90),
      'latitude' => $faker->randomFloat,
      'longitude' => $faker->randomFloat,
  ];
});
