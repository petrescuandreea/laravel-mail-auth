<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Videogame;
use Faker\Generator as Faker;

$factory->define(Videogame::class, function (Faker $faker) {
    return [
        
        'title' => $faker -> words(3, true),
        'subtitle' => $faker -> words(4, true),
        'rating' => $faker -> numberBetween(0, 5),
    ];
});
