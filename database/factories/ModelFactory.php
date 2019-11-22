<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Question::class, function (Faker $faker) {
    $date = $faker->dateTimeThisMonth;

    return [
        //
        'title'=>$faker->sentence(),
        'content'=>$faker->paragraph(),
        'created_at'=>$date,
        'updated_at' =>$date
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    $date = $faker->dateTimeThisMonth;

    return [
        //
        'comment'=>$faker->paragraph(),
        'name'=>$faker->name,
        'created_at'=>$date,
        'updated_at' =>$date
    ];
});