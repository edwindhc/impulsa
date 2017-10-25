<?php

use Faker\Generator as Faker;
use App\Question;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
      'title_answer' => $faker->Company,
      'correct' => $faker->boolean(50),
      'id_question' => 3,
      'id_test' => 1,
    ];
});
