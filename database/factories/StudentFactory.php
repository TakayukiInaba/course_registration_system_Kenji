<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
            'username' =>$faker->unique()->numberBetween($min = 30000, $max = 50000),
            'grade_class_number' =>$faker->unique()->numberBetween($min =000001 , $max = 133333),
            'last_name' => $faker->lastName,
            'name' => $faker->firstName,
            'password' => bcrypt('himitu'), // himitu
            'remember_token' => str_random(10),
    ];
});
