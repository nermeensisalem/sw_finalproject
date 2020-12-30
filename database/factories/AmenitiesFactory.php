<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Amenities;
use Faker\Generator as Faker;

$factory->define(Amenities::class, function (Faker $faker) {
    return [
        'name'=>$faker->word
    ];
});
