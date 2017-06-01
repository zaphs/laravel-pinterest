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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt('123456'),
        'gender'         => $faker->randomElement(['Male', 'Female']),
        'description'    => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'remember_token' => str_random(10),
        'birthdate'      => $faker->dateTimeBetween('-40 years', '-18 years'),
        'avatar'         => $faker->imageUrl(190, 190, 'people'),
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->word,
        'description'   => $faker->paragraph(1),
        'slug'          => $faker->uuid,
        'url'           => $faker->imageUrl(),
    ];
});

$factory->define(App\Tag::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->unique()->word(),
    ];
});