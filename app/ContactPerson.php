<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{

	protected $fillable = ["application_id",'first_name','middle_name',
						'last_name','city','woreda','kfle_ketema','kebele','house_number','telephone_home','telephone_office','po_box'];

	public function application(){
		return $this->belongsTo("App\Application");
	}
}
