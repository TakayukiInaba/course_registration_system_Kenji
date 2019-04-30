<?php

use Faker\Generator as Faker;

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

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
        'value' => $faker->lastName,
        'name' => $faker->firstName,
        'subject_id' =>$faker->numberBetween($min = 1, $max = 5),
        'position_id'=>$faker->numberBetween($min = 1, $max = 4),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('himitu'), // himitu
    ];

});