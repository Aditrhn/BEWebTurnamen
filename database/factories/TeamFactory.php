<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'max_member' => $faker->randomDigitNotNull,
        'logo_url' => $faker->image(public_path('images/team_logo/'), true, true, null, false),
        'description' => $faker->text(),
        'created_at' => now(),
        'updated_at' => now(),
        'games_id' => 1
    ];
});
