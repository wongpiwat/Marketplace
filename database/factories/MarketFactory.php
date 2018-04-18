<?php

use Faker\Generator as Faker;

$factory->define(App\Market::class, function (Faker $faker) {
    return [
          'name' =>$faker->name;
          'location'=>$faker->address;
          'start_time'=>$faker->landline;

    ];
});
