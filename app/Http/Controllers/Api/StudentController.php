<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentController extends Controller
{

    public function index(){
//        $students = Student::with('application')->with("department")->get();
        $page = LengthAwarePaginator::resolveCurrentPage();
        $total = Student::all()->count();
        $perPage = 5;
        $result = Student::with("application")->with("department")->with('program')->get();
        $result = $result->forPage($page,$perPage);
        $students = new LengthAwarePaginator($result,$total,$perPage,$page,['path'=>LengthAwarePaginator::resolveCurrentPage(),]);
        return response()->json($students);
//        return response()->json($students);
    }
    public function show($student_id){
        $student = Student::find($student_id);
        return response()->json($student);
    }

    public function destroy($id){
        $student = Student::find($id);
        return response()->json($student);
    }
}
