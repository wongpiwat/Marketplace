<?php

use Faker\Generator as Faker;

$factory->define(App\Issue::class, function (Faker $faker) {
    $project_ids = App\Project::all()->pluck('id')->toArray();
    $category_ids = App\Category::all()->pluck('id')->toArray();
    $user_ids = App\User::all()->pluck('id')->toArray();
    return [
        'project_id' => $faker->randomElement($project_ids),
        'category_id' => $faker->randomElement($category_ids),
        'summary' =>$faker->word,
        'status' => $faker->randomElement(['new','feedback','acknowledged','confirmed','resolved','closed']),
        'reporter' => $faker->randomElement($user_ids),
        'assigned_to' => $faker->randomElement($user_ids),
        'priority' => $faker->randomElement(['none', 'low', 'normal', 'high', 'urgent', 'immediate']),
        'severity' => $faker->randomElement(['feature', 'trivial', 'text', 'tweak', 'minor', 'major', 'crash', 'block']),
        'description' => $faker->paragraph,
        'steps' =>$faker->paragraph
    ];
});
