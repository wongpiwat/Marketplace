<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'remember_token' => null,
        'username' => $faker->userName,
        'type' => $faker->randomElement(['seller']),
        'is_enabled' => $faker->boolean(90)
    ];
});
