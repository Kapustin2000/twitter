<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Traffic::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        },
        'profile_user_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        },
        'created_at' => $faker->dateTimeBetween(\Illuminate\Support\Carbon::now()->startOfWeek(), \Illuminate\Support\Carbon::now()->endOfWeek())
    ];
});
