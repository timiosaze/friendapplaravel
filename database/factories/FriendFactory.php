<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Friend;
use Faker\Generator as Faker;

$factory->define(Friend::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'about' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
    ];
});
