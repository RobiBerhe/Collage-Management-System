<?php

use Faker\Generator as Faker;

$factory->define(App\Program::class, function (Faker $faker) {
    return [
        'program_name'=>'',
        'remarks'=>$faker->paragraph,
    ];
});
