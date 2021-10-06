<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    $types = ['percentage', 'amount'];
    $type = $types[rand(0,1)];
    $value = $type == 'amount' ? rand(10,1000) * 1000 : rand(1,7) * 10;
    return [
        'code' => \Illuminate\Support\Str::random(6),
        'value' => $value,
        'value_type' => $type,
        'max_attempts' => 3,
        'expires_at' => now()->addDays(rand(1,8))
    ];
});
