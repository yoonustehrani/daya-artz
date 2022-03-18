<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Definition;
use Faker\Generator as Faker;

$factory->define(Definition::class, function (Faker $faker) {
    $groups = ['business_type', 'product_type'];
    return [
        'group' => $groups[rand(0,1)],
        'name' => $faker->ipv4()
    ];
});
