<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ads;
use Faker\Generator as Faker;

$factory->define(ads::class, function (Faker $faker) {
    return [
        //
        'created_at' => now(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
