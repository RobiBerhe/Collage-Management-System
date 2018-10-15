<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\Student;

class ProfileController extends Controller
{
    public function __construct(){

    }

    public function uploadPicture(Request $request,$id){
    	
		$student = Student::find($id);
    	
    	if($request->hasFile('photo') && $request->file('photo')->isValid()){
    		if(($request->photo->extension() == "jpeg") || ($request->photo->extension() == "jpg") || ($request->photo->extension() == "png")){
    			$path = $request->photo->store("public/uploads");

    			// we are going to have to replace the public with storage as it is referenced by a sym link.
    			$path = str_replace("public", "/storage", $path);
    			$student->profile_picture_path = $path;
    			$student->save();
    			return response()->json($student->profile_picture_path);
    		}
    		else{
    			return response()->json(['Error'=>'The file provided is not an image file.']);
    		}
    	}
    	return response()->json(['Message'=>'Canceled Image upload.']);

    }

    // return the path of the profile picture of the user specified by the id parameter.
    public function get($id){
    	$student = Student::find($id);

    	return response()->json($student->profile_picture_path);
    }
}
