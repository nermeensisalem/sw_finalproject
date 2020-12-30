<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Author::class, function (Faker $faker) {
    return [
        "authorName"=>$faker->name,

    ];
});
