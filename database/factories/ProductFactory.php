<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
	    'brand_name'  => $faker->word,
	    'model_name'  => $faker->word,
	    'price'       => $faker->numberBetween('200000', '999999'),
	    'description' => $faker->sentence($nbWords = 5)
    ];
});