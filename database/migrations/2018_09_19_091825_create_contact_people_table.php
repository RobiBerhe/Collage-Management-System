<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("application_id")->unsigned(); // foreign key.
            $table->string("first_name");
            $table->string("middle_name");
            $table->string("last_name");
            $table->string("city");
            $table->string("woreda");
            $table->string("kfle_ketema");
            $table->integer("kebele");
            $table->string("house_number");
            $table->bigInteger("telephone_home");
            $table->bigInteger("telephone_office");
            $table->integer("po_box");
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
        Schema::dropIfExists('contact_people');
    }
}
