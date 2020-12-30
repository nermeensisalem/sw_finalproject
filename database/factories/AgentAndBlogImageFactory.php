<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\agent_and_blog_image;
use Faker\Generator as Faker;

$factory->define(agent_and_blog_image::class, function (Faker $faker) {
    $imageable= [\App\Blog::class, \App\Agent::class];
    $imageableType= $faker->randomElement($imageable);
    $imageable=factory($imageableType)->create();

    return [
        'path'=>$faker->url."image.jpg",
        'imageable_id'=>$imageable->id,
        'imageable_type'=>$imageableType
    ];
});
