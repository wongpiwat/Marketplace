<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
         'username' => $faker->userName,
                'first_name' => $faker->name,
                'last_name' => $faker->word,
                'password' => bcrypt('secret'), // secret
                'email' => $faker->unique()->safeEmail,
                'address' => $faker->word,
                'birthday' =>$faker->dateTimeThisCentury->format('Y-m-d'),
                'phone' => $faker->phoneNumber,
                'image' => $faker->word,
                'type' => $faker->randomElement(['seller','organizer','administrator']),
                'is_enabled' => $faker->boolean(90),
                'remember_token' => null
    ];
});
