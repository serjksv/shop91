<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'review' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'user_id' => $faker->numberBetween(1, 10),
        'product_id' => $faker->numberBetween(1, 100),
        'created_at' => $faker->numberBetween(1, 100),
    ];
});
