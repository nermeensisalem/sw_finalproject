<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Property::class, function (Faker $faker) {
    return [
        "name"=> $faker->name,
        "description"=>$faker->text(250),
        "type_id"=>\App\property_type::all()->random()->id,
        "area"=>$faker->randomNumber(3),
        "beds"=>$faker->randomNumber(),
        "baths"=>$faker->randomNumber(),
        "garage"=>$faker->randomNumber(),
        "location"=>$faker->address,
        "status"=>$faker->word,
        "price"=>$faker->randomNumber(),
        'agent_id'=>\App\Agent::all()->random()->id
    ];
});
