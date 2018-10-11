<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("department_id")->unsigned();// we'll make this a foreign key later. new -> changed the division id into department id as sections belong to departments.
            $table->integer("admission_id")->unsigned(); //exa: REG/EXT
            $table->string("section_name"); // the name of the section like: A,B,C etc...
            $table->text("description");
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
        Schema::dropIfExists('sections');
    }
}
