<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Agent::class, function (Faker $faker) {
    return [
        "name"=> $faker->name,
        "description"=>$faker->sentence,
//        "image"=>"agent_images/img.jpg",
        "phone"=>$faker->phoneNumber,
        "email"=>$faker->safeEmail,
        "facebookLink"=>$faker->url,
        "instagramLink"=>$faker->url,
        "twitterLink"=>$faker->url,
        "pintrestLink"=>$faker->url,
        "dribbleLink"=>$faker->url
    ];
});
