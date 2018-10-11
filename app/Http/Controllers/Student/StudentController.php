<?php

namespace App\Http\Controllers\Student;
use App\Application;
use App\Student;
use App\Department;
use App\AdmittedList;
use App\Section;
use App\Program;
use App\Admission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentAdmissionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use PDF;


class StudentController extends Controller
{
    //

	public function __construct(){
		$this->middleware('auth');
	}



    public function index(){
       return view("dashboard.students-index");
    }



    /*shows the form for registering students.*/
    public function create(){
    	return view("dashboard.students-create");
    }

    public function store(StudentCreateRequest $request){
    	$studentApplication = Application::create(
    		array(
    			'first_name'=>$request->get("first_name"),
    			'middle_name'=>$request->get("middle_name"),
    			'last_name'=>$request->get("last_name"),
    			'date_of_birth'=>$request->get("date_of_birth"),
    			'place_of_birth'=>$request->get("place_of_birth"),
    			'sex'=>$request->get("gender"),
    			'nationality'=>"Ethiopia",
    			'kfle_ketema'=>$request->get("sub_city"),
    			'city'=>$request->get("city"),
    			'kebele'=>$request->get("kebele"),
    		)
    	);
    	$lastStudentApplication = $studentApplication; 
    	$departments = Department::all();
        $programs = Program::all();
        return redirect('students/'.$lastStudentApplication->id."/create-2");
    }


    public function create_two($application_id){
        $lastStudentApplication = Application::find($application_id);
        if($lastStudentApplication == null)
            return "Unknown resource";
         $departments = Department::all();
         $programs = Program::all();
         $admissions = Admission::all(); 
        return view("dashboard.students-create-step-2",compact('lastStudentApplication','departments','programs','admissions'));
    }

    public function show($id){
        $student = Student::find($id);
        // if the student is not found.
        if($student == null){
            $message = "There is no student with a student id of ".$id;
            return view("404.404",compact("message"));
        }
        $contact_person = $student->application->contact_person;
        return view('dashboard.students-show',compact('student','contact_person'));
    }

    


    // this method continues the second part of the student registration form.
    public function storeStudent(StudentAdmissionRequest $request){
    	
    	$student = new Student(array(
    			'application_id'=>$request->get("student_application_id"),
    			'admission_id'=>$request->get("admission"),
                'program_id'=>$request->get("program"),
    			'department_id'=>$request->get("department"),
    			'section_id'=>$request->get("section"),
    	));
    	$student->save();
    	$admittedList = new AdmittedList(
    				array(
    					'student_id'=>$student->id,
    					'date_of_admission'=>$request->get("date_of_admission"),
    					'graduation_year'=>$request->get("graduation_year"),
    				));
    	$admittedList->save();
    	return redirect(route('students.index'));
    }

    public function searchStudent($key,$value){
        $students = Student::with('application')->with('program')->with("department")->where($key,'LIKE','%'.$value.'%')->join('applications','students.application_id','=','applications.id')->get();
        return response()->json($students);
    }

    public function filterStudent($program_id,$department_id,$admission=null){
        $students = Student::with('application')->with('department')->with('program')
                                ->join('applications','students.application_id','=','applications.id')
                                ->join('departments','students.department_id','=','departments.id')
                                ->join('programs','students.program_id','=','programs.id')
                                ->where('programs.id','=',$program_id)
                                ->where('departments.id','=',$department_id);
                                // ->get(['students.*']);
        if($admission !=null)
            $students->where('admission_id','=',$admission);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $total = $students->get(['students.*'])->count();
        $perPage = 5;
        $result = $students->get(['students.*']);
        $result = $result->forPage($page,$perPage);
        $students = new LengthAwarePaginator($result,$total,$perPage,$page,['path'=>LengthAwarePaginator::resolveCurrentPage(),]);
        return response()->json($students);

    }


    public function destroy($id){

        $student = Student::find($id);//->with('application')->with('admittedList')->get();
        $student->application()->delete();
        $student->admittedlist()->delete();
        $student->delete();
        return response()->json($student);
    }
}
