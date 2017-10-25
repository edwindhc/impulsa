<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(App\Test::class, function (Faker $faker) {
    return [
        'title_test' => $faker->Company,
        'description' => $faker->Text,
        'id_category' => factory(Category::class)->create()->id,
    ];
});
