<?php

use Faker\Generator as Faker;

$factory->define(App\Feedback::class, function (Faker $faker) {
    $user_ids = App\User::all()->pluck('id')->toArray();
    return [
        'topic' => $faker->word,
        'comment' => $faker->paragraph,
        'created_by' => $faker->randomElement($user_ids),
    ];
});
