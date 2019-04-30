<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
   

    return [
        //
        'username' => str_random(10),
        'password' => bcrypt('himitu'),
    ];
});
