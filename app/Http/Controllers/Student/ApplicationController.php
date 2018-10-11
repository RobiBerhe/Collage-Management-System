<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;

class ApplicationController extends Controller
{
    //
    public function index(){

    }

    public function show($application_id){
        $application = Application::find($application_id);
        return response()->json($application);
    }
}
