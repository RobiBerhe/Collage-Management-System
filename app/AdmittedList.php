<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmittedList extends Model
{
    protected $guarded = [];

    public function student(){
    	$this->belongsTo('App\Student');
    }
}
