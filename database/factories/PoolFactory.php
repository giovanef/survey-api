<?php

$factory->define(App\Pool::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->text(200),
    ];
});
