<?php

use Faker\Generator as Faker;

$factory->define(App\Entry::class, function (Faker $faker) {
    return [
        //
        'student_id' => $faker->numberBetween($min = 1, $max = 100),
        'course_id' =>$faker->numberBetween($min = 1, $max = 200),
        'term_id' => $faker->numberBetween($min = 1, $max = 6),
        'time_id' => $faker->numberBetween($min = 1, $max = 4),       
    ];
});
