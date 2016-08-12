<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Todo::class, function ($faker) {
    return [
        'name' => $faker->word,
        'status' => $faker->randomElement($array = array ('pending','finished')),
        'color' => $faker->safeColorName,
        'user_id' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
    ];
});

$factory->define(App\Comment::class, function ($faker) {
    return [
        'comment' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'todo_id' => $faker->biasedNumberBetween($min = 7, $max = 12, $function = 'sqrt'),
        'user_id' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
    ];
});

$factory->define(App\Project::class, function ($faker) {
    return [
        'name' => $faker->word,
        'user_id' => $faker->biasedNumberBetween($min = 1, $max = 2, $function = 'sqrt'),
    ];
});
