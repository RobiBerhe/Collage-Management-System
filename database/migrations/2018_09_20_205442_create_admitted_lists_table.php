<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmittedListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admitted_lists', function (Blueprint $table) {
            $table->increments('id'); // the application id.
            // $table->integer("section_id")->unsigned(); //a foreign key for the sections model. new-> we have removed this because a section should belong to a department.
            $table->integer("student_id")->unsigned();
            $table->date("date_of_admission");
            $table->year("graduation_year");
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
        Schema::dropIfExists('admitted_lists');
    }
}
