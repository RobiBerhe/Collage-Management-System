<?php

use Faker\Generator as Faker;

$factory->define(\App\Application::class, function (Faker $faker) {
    return [
        'first_name'=>$faker->firstName,
        'middle_name'=>$faker->lastName,
        'last_name'=>$faker->lastName,
        'date_of_birth'=>$faker->date(),
        'place_of_birth'=>$faker->city,
        'sex'=>$faker->randomElement(['Male','Female']),
        'nationality'=>'Ethiopia',
        'kfle_ketema'=>$faker->streetName,
        'city'=>$faker->city,
        // 'woreda'=>$faker->streetSuffix,
        'kebele'=>$faker->randomElement([3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]),
    ];
});
