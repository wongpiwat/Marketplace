<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
<<<<<<< HEAD
        'username' => $faker->name,
                'first_name' => $faker->username,
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
=======
        'username' => $faker->userName,
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


>>>>>>> fe16a7011818d0e5e149b49b8a885ecba64bd123
});
