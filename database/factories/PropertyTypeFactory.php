<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\property_type;
use Faker\Generator as Faker;

$factory->define(property_type::class, function (Faker $faker) {
    return [
        "type"=>$faker->word
    ];
});
