<?php

use Faker\Generator as Faker;
use App\Test;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
      'title_question' => $faker->Company,
      'id_test' => 1,
    ];
});
