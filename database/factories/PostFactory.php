<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->sentence,
        'image' => $faker->image('public/storage',640,480, null, false),
        'user_id' => User::inRandomOrder()->first()->id
    ];
});
