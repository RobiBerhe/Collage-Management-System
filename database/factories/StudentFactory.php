<?php

use Faker\Generator as Faker;
use App\Section;
use App\Program;
$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'application_id'=>factory(App\Application::class)->create()->id,
        'program_id'=>function(){
        	return App\Program::all()->random(); 
        },
        'department_id'=> '',
        'admission_id'=>'',
        'section_id'=>'', // to be filled later, as it is dependent on the dep id.
    ];
});
