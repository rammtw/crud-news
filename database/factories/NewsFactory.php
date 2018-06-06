<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\News::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1, 3),
        'title' => $faker->text(150),
        'description' => $faker->realText(200)
    ];
});
