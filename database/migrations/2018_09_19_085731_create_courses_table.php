<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string("course_name");
            $table->integer("credit_hours");
            $table->integer("lecture_hours");
            $table->integer("contact_hours");
            $table->text("remarks");
            $table->string("course_type"); //this should be moved into the curriculum,
            // course a course might be a common course for one dep and a main course for another.
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
        Schema::dropIfExists('courses');
    }
}
