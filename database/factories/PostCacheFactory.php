<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PostCache;
use Faker\Generator as Faker;

$factory->define(PostCache::class, function (Faker $faker) {
    return [
       'title' => $faker->sentence,
       'description' => $faker->paragraph,
    ];
});
