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

$factory->define(App\Models\Post::class, function ($faker) {
    return [
        'id'      => md5(uniqid(rand())),
        'cat'     => 'post',
        'name'    => $faker->sentence,
        'content' => $faker->paragraph,
        'img'     => $faker->image($dir = public_path().'/uploads/', $width = 640, $height = 480),
        'release_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'is_top' => 1,
        'sort' => 1,
        'status' => 1,
        'title' => '',
        'keywords' => '',
        'description' => '',
        'slug' => ''
    ];
});
