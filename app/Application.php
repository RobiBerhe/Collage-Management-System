<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	
	protected $fillable = ["first_name","middle_name","last_name","date_of_birth","place_of_birth"
							,"sex","nationality","kfle_ketema","city","kebele"];
	
    public function student(){
        return $this->hasOne('App\Student');
    }

     public function contact_person(){
        return $this->hasOne("App\ContactPerson");
    }
}
