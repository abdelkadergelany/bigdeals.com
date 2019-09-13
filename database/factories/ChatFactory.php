<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\chat;
use Faker\Generator as Faker;

$factory->define(chat::class, function (Faker $faker) {
    return [
        //
        'message' => $faker->text,
        'created_at' => now(),
        'updated_at' => now(),
         'from' => function () {
            return factory(App\User::class)->create()->id;},
        'to' => function () {
            return factory(App\User::class)->create()->id;},
        
    ];
});
