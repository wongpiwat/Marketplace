<?php

use Faker\Generator as Faker;

$factory->define(App\Market::class, function (Faker $faker) {
    $name = $faker->name;
    $user_ids = App\User::all()->pluck('id')->toArray();

    return [
          'name' =>$name;
          'location'=>$faker->address;
          'start_time'=>$faker->time($format = 'H:i:s', $max = 'now');
          'close_time'=>$faker->time($format = 'H:i:s', $max = 'now');
          'date'=>$faker->dateTime($max = 'now', $timezone = null)
          'detail'=>$faker->paragraph;
          'teaser'=>$faker->name;
          'images'=>$faker->image('C:\xampp\htdocs\The-Marketplace\storage\app\public\images\markets\.'   $name, 200, 150, 'cats');
          'created_by'=>$faker->randomElement($user_ids);

    ];
});
