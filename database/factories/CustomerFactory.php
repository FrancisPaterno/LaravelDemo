<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\customers;
use Faker\Generator as Faker;

$factory->define(customers::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'profile_pic' => $faker->sentence,
        'address' => $faker->address,
        'contact' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'user_id' => factory(\App\User::class)
    ];
});
