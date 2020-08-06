<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Republic;
use Faker\Generator as Faker;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        'name' => $faker->companySuffix,
        'city' => $faker->cityPrefix,
        'district' => $faker->state,
        'address' => $faker->streetAddress,
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'user_id' => rand(1,10),
    ];
});
