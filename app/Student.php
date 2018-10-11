<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $fillable = ["application_id","admission_id",'department_id','section_id','program_id'];


    public function application(){
        return $this->belongsTo('App\Application');
    }
    public function department(){
        return $this->belongsTo("App\Department");
    }

    public function program(){
    	return $this->belongsTo("App\Program");
    }

    public function admittedlist(){
        return $this->hasOne("App\AdmittedList");
    }

    public function admission(){
        return $this->belongsTo("App\Admission");
    }

    public function section(){
        return $this->belongsTo("App\Section");
    }
}
