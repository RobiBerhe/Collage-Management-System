<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{


	public function sections(){
		return $this->hasMany("App\Section");
	}

    public function students(){
        return $this->hasMany("App\Student");
    }
}
