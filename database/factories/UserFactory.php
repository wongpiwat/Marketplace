<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
      'email' => $faker->unique()->safeEmail,
      'password' => bcrypt('secret'),
      'first_name' => $faker->firstName,
      'last_name' => $faker->lastName,
      'address' => $faker->address,
      'birthday' => $faker->date,
      'phone' => $faker->phoneNumber,
      'image' => $faker->url,
      'type' => $faker->randomElement(['seller','organizer']),
      'is_vertified' => $faker->boolean(90),
      'is_enabled' => $faker->boolean(90),
      'remember_token' => null,
    ];
});
