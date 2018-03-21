<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        //
        'term_id' => $faker->numberBetween($min = 1, $max = 6),
        'time_id' => $faker->numberBetween($min = 1, $max = 4),
        'subject_id' => $faker->numberBetween($min = 1, $max = 5),
        'grade_id' =>$faker->numberBetween($min = 1, $max = 5),
        'level_id' => $faker->numberBetween($min = 1, $max = 3),
        'title' => str_random(10),
        'summary' => str_random(80),
        'teacher_id' =>$faker->numberBetween($min = 1, $max = 9),
        'fee' =>$faker->numberBetween($min = 100, $max = 1000),
    ];
});
