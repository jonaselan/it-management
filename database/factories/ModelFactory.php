<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(itmanagement\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'client_id' => function () {
            return factory(itmanagement\Client::class)->create()->id;
        }
    ];
});

$factory->define(itmanagement\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'cnpj' => "000.000.000-00",
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(itmanagement\Contract::class, function (Faker $faker) {
    return [
        'object' => $faker->firstName,
        'validity' => $faker->date(),
        'value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
        'payment' => $faker->randomDigit,
        'client_id' => function () {
            return factory(itmanagement\Client::class)->create()->id;
        }
    ];
});

$factory->define(itmanagement\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'client_id' => function () {
            return factory(itmanagement\Client::class)->create()->id;
        }
    ];
});
