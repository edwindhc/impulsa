<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(App\Test::class, function (Faker $faker) {
    return [
        'title' => $faker->Company,
        'id_category' => factory(Category::class)->create()->id,
    ];
});
