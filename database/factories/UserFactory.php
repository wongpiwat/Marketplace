<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'remember_token' => null,
        'username' => $faker->userName,
        'access_level' => $faker->randomElement(['viewer','reporter','updater','developer','manager']),
        'is_enabled' => $faker->boolean(90)
    ];
});
