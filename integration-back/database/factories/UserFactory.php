<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
        $name = "Jojo";
        $gender = ['Male', 'Female'];
        return [
            'name' => $name,
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('123456'),
            'cpf' => $faker->cpf(false),
            'telephone' => $faker->cellphoneNumber,
            'gender' => $gender[rand(0,1)],
            'birthday' => $faker->date($format = 'd-m-Y', $max = 'now'),
            'remember_token' => Str::random(10),
        ];
});
