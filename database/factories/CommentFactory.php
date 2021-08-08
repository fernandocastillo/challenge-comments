<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    $date = $faker->dateTimeThisYear();
    return [
        'name' => $faker->name,
        'comment' => $faker->realText(),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
