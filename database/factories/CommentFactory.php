<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'comment' => $faker->realText(),
    ];
});
