<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        'department_name'=>'',
        'building_number'=>$faker->randomNumber(),
        'office_number'=>$faker->randomNumber(),
        'telephone_number'=>$faker->phoneNumber,
        'remarks'=>$faker->paragraph,
        'program_id'=>function(){
        	return App\Program::all()->random();
        }
    ];
});
