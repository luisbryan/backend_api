<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Testu\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Testu\Entities\Test::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'user_id' => 1,
        'sub_category_id' => 3,
        'description' => $faker->realText(100, 3)
    ];
});

$factory->define(Testu\Entities\TestQuestion::class, function (Faker\Generator $faker) {
	return [
		'question' => $faker->realText(500),
		'test_id' => 1
	];
});
