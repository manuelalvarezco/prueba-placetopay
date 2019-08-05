<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence(6),
        'img' =>$faker->image('public/img',400,300, null, false),
        'price' => $faker->randomNumber(2)
    ];
});
