<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Rooms;
use Faker\Generator as Faker;

$factory->define(Rooms::class, function (Faker $faker) {
    return [
        //
        'room' => $faker->unique(2)->word,
        'description' => $faker->paragraph,
        'room_type_id' => factory(\App\models\Room_Type::class),
        'room_status_id' => factory(\App\models\RoomStatus::class),
        'user_id' => factory(\App\User::class)
    ];
});
