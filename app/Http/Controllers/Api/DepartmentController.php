<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;

class DepartmentController extends Controller
{
    

    public function index(){
    	$departments = Department::all();
    	return response()->json($departments);
    }
    public function show($id){
    	$department = Department::find($id);
    	return response()->json($department);
    }
}
