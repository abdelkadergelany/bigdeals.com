<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\conversations;
use Faker\Generator as Faker;

$factory->define(conversations::class, function (Faker $faker) {
    return [
        //    
        'created_at' => now(),
        'updated_at' => now(),
        'userId' => function () {
            return factory(App\User::class)->create()->id;},
        'with' => function () {
            return factory(App\User::class)->create()->id;},      
    ];
});




