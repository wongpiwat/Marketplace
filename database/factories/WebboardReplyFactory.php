<?php

use Faker\Generator as Faker;

$factory->define(App\WebboardReply::class, function (Faker $faker) {
    $webboard_ids = App\Webboard::all()->pluck('id')->toArray();
    $user_ids = App\User::all()->pluck('id')->toArray();

    return [
        //
        'reply_to' => $faker->randomElement($webboard_ids),
        'comment' => $faker->text,
        'created_by' => $faker->randomElement($user_ids),
    ];
});
