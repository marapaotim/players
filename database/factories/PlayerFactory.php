<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Player;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

 $factory->define(App\Model\Player::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'second_name' => $faker->lastName,
        'form' => rand(4, 40),
        'total_points' => rand(4, 40),
        'influence' => rand(4, 40),
        'creativity' => rand(4, 40),
        'threat' => rand(4, 40),
        'ict_index' => rand(4, 40)
    ];
});
