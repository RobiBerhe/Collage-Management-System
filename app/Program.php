<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //

    public function departments(){
    	return $this->hasMany('App\Department');
    }
}
