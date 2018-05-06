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

$factory->define(App\Model\User::class, function (Faker $faker) {
    static $password;
    $gender = $faker->randomElement(['male', 'female', 'others']);

    if($gender == "female")
        $avatar = $faker->randomElement(['girl.png', 'girl-1.png', 'girl-2.png']);
    else
        $avatar = $faker->randomElement(['boy.png', 'boy-1.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png']);
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $gender,
        'phone' => $faker->isbn10(),
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'avatar' => $avatar,
        'about' => $faker->text($maxNbChars = 200),
        'role' => 'user',
        'status' => TRUE,
        'remember_token' => str_random(10),
    ];
});
