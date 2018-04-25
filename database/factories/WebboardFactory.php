<?php

use Faker\Generator as Faker;

$factory->define(App\Webboard::class, function (Faker $faker) {
    $user_ids = App\User::all()->pluck('id')->toArray();
    
    return [
        //
        'topic' => $faker->word,
        'details' => $faker->text,
        'created_by' => $faker->randomElement($user_ids),
    ];
});
