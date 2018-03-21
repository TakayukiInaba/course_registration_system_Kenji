<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
            'first_name' => $faker->lastName,
            'name' => $faker->firstName,
            'email' => $faker->unique()->safeEmail,
            'student_id' =>$faker->numberBetween($min = 3000, $max = 5000),
            'password' => bcrypt('himitu'), // himitu
            'remember_token' => str_random(10),
    ];
});
