<?php

use Faker\Generator as Faker;
use App\Department;
$factory->define(App\Section::class, function (Faker $faker) {
    return [
       	'department_id'=>'',
       	'admission_id'=>'',
        'section_name'=>$faker->randomElement(["A","B","C","D","E","F","G","H","I","J","K","L","M","N"]),
        'description'=>$faker->paragraph,
        'remarks'=>$faker->paragraph,
    ];

     // 'department_id'=>function(){
     //    	return Department::all()->random()->id;
     //    },
});
