<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Builder;

$factory->define(\App\Post::class, function (Faker $faker) {

    $users = \App\User::doesntHave('roles')->get();

    return [
        'owner_id' => $users->random()->id,
        'slug' => $faker->slug(),
        'name' => $faker->sentence(rand(2, 4)),
        'preview_text' => $faker->sentence(rand(5, 9)),
        'detail_text' => $faker->sentence(rand(10, 30)),
        'published' => $faker->boolean(),
    ];
});
