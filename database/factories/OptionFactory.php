<?php

$factory->define(App\Option::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->sentence(6),
    ];
});
