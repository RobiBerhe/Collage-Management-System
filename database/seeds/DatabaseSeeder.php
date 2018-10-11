<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        factory(\App\Application::class,20)->create();


        $programs = factory(App\Program::class,3)->make();
        $proramNames = ["Masters Degree","Under Graduate Degree","Deploma"];

        $i=0;
        foreach ($programs as $program) {
           $program->program_name = $proramNames[$i];
           $program->save();
           $i++;
        }
        
        $admissions = factory(App\Admission::class,2)->make();
        $admissionNames = ['Regular','Extension'];
        $i=0;
        foreach ($admissions as $admission) {
            $admission->admission_name = $admissionNames[$i];
            $admission->save();
            $i++;
        }

        $departments = factory(App\Department::class,5)->make();
        $depts = ['Accounting','Accounting Information System','Computer Science','Management Information System','Software Engineering'];
        $i=0;
        foreach ($departments as $department){
            $department->department_name = $depts[$i];
            $department->save();
            $sections = factory(App\Section::class,3)->make();
            foreach ($sections as $section) {
                $section->department_id = $department->id;
                $section->admission_id = App\Admission::all()->random()->id;
                $section->save();
            }
            $i++;
        }
        // factory(App\Section::class,15)->create();
        
        $departments = App\Department::all();
        $students = factory(App\Student::class,20)->make();
        foreach ($students as $student) {
            $student_program_id = $student->program_id;
            // $randomDep = DB::table('departments')->where('program_id',$student_program_id)->get()->random();
            // dd($student->program_id);
            $randomDep = App\Department::where('program_id','=',$student->program_id)->with('sections')->get()->random();
            $student->department_id = $randomDep->id;
            // dd($randomDep->sections);
            // echo $randomDep->id;
            $student->section_id = $randomDep->sections->random()->id;
            $student->admission_id = App\Admission::all()->random()->id;
            $student->save();
        }

        $students = App\Student::all();
        $admittedStudents = factory(App\AdmittedList::class,20)->make();
        $i=0;
        foreach ($admittedStudents as $admitted) {
            $admitted->student_id = $students[$i]->id;
            $admitted->save();
            $i++;
        }
    }
}
