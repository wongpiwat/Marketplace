<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'market_id' => $faker->unique()->safeEmail,
        'topic' => $faker->word,
        'details' => $faker->paragraph,
        'created_by' => $faker->userName
    ];
});
