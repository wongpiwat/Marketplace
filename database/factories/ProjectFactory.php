<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->name,
        'status'=>$faker->randomElement(['development','release','stable','obsolate']),
        'view_status'=>$faker->randomElement(['private','public']),
        'description'=>$faker->paragraph,
    ];
});
