<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'user_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        },
    ];
});
