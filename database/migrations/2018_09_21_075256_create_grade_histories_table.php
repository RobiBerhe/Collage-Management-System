<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("student_id")->unsigned(); //foreign key.
            $table->integer("course_id")->unsigned(); //foreign key.
            $table->char("grade",3); // for example A++.
            $table->text("remarks");
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
        Schema::dropIfExists('grade_histories');
    }
}
