<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\images_property;
use Faker\Generator as Faker;

$factory->define(images_property::class, function (Faker $faker) {
    return [
        "path"=> "property_images/img.jpg",
        "property_id"=>App\Property::all()->random()->id

    ];
});
