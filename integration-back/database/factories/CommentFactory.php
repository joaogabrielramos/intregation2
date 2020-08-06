<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $name = ["Jonathan Joestar","Joseph Joestar", "Kujo Jotaro", "Josuke Higashikata", "Giorno Giovanna", "Kujo Jolyne"];
    return [
        'username' => $name[rand(0,5)],
        'text' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'user_id' => rand(1,10),
        'republic_id' => rand(1,5),
    ];
});
