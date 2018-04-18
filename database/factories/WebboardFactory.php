<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'market_id' => $faker->unique()->safeEmail,
        'topic' => $faker->
        'details' => null,
        'created_by' => $faker->userName
    ];

    $table->increments('id');
    $table->unsignedInteger('market_id');
    $table->string('topic');
    $table->text('details');
    $table->unsignedInteger('created_by');
    $table->timestamps();
    $table->foreign('market_id')->references('id')->on('markets');
    $table->foreign('created_by')->references('id')->on('users');

});