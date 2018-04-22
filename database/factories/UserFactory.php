<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => null,
        'address' => $faker->address,
        'birthday' => $faker->date,
        'phone' => $faker->phoneNumber,
        'image' => $faker->url,
        'type' => $faker->randomElement(['seller','organizer']),
        'is_enabled' => $faker->boolean(90)
    ];
});
