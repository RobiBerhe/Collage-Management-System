<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id'); //we will auto generate real student id's later.
            $table->integer("application_id")->unsigned(); //foreign key.
            $table->integer("program_id")->unsigned(); //foreign key for which the student has applied for. 
            $table->integer("department_id")->unsigned(); //foreign key.
            $table->integer("admission_id")->unsigned();
            $table->integer("section_id")->unsigned(); //foreing key new-> sections has a collection of students so we should have the section id as a foriegn key here..
            // $table->integer("status_id")->unsigned(); //foreign key. // new-> a student has one status so store a student_id in there.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
