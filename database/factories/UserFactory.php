<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username' => $faker->nameName,
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'address' => $faker->word,
        'last_name' => $faker->word,
        'image' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'remember_token' => null,
        'phone' => $faker->phoneNumber,
        'birthday' =>$faker->dateTimeThisCentury->format('Y-m-d'),
        'type' => $faker->randomElement(['seller','organizer','administrator']),
        'is_enabled' => $faker->boolean(90)
    ];

    
});
