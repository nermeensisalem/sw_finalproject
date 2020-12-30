<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence,
//        "image" => "blog_images/img.jpg",
        "date" => $faker->date(),
        "body" => $faker->text,
        'category_id' => \App\Category::all()->random(),
        'author_id' => \App\Author::all()->random()->id
    ];
});

