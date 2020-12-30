<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        "name"=>$faker->name,
        "message"=> $faker->sentence,
        "email"=>$faker->email,
        "date"=>$faker->date(),
        'blog_id'=>\App\Blog::all()->random()->id
    ];
});
