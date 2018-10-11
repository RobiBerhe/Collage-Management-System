<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
class ApplicationController extends Controller
{
    public function index(){
        $applications = Application::paginate(10);
        return response()->json($applications);
    }

    public function show($application_id){
        $application = Application::find($application_id);
        return response()->json($application);
    }

}
