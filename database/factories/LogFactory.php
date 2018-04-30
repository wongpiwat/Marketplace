<?php

use Faker\Generator as Faker;

$factory->define(App\Log::class, function (Faker $faker) {
    $user_ids = App\User::all()->pluck('id')->toArray();

    return [
        //
        'topic' => $faker->word,
        'event' => $faker->word,
        'created_by' => $faker->randomElement($user_ids),
    ];
});
