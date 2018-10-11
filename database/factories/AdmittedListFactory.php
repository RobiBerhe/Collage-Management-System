<?php

use Faker\Generator as Faker;
use App\Program;
$factory->define(App\AdmittedList::class, function (Faker $faker) {
    return [
        'student_id'=>'',
        'date_of_admission'=>$faker->date("Y-m-d","now"),
        'graduation_year'=>$faker->year,
    ];
});
