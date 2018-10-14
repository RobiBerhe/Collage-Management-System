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



    /**
    * Displays The view for displaying the listing of the resource.
    * 
    */
    public function index(){
       return view("dashboard.students-index");
    }



    /**
    * Shows the form for creating a student resource.
    * @return \Illuminate\Http\Response
    */
    public function create(){
    	return view("dashboard.students-create");
    }


    /**
    * Stores the provied Student data into the database.
    * @param StudentCreateRequest $request
    * @return \Illuminate\Http\Response
    */
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


    /**
    * Displays the form for the continuation of the student registration process.
    * @param int $application_id
    * @return \Illuminate\Http\Response
    */
    public function create_two($application_id){
        $lastStudentApplication = Application::find($application_id);
        if($lastStudentApplication == null)
            return "Unknown resource";
         $departments = Department::all();
         $programs = Program::all();
         $admissions = Admission::all(); 
        return view("dashboard.students-create-step-2",compact('lastStudentApplication','departments','programs','admissions'));
    }


    /**
    * Displays the specified student resource.
    * @param int $id
    * @return \Illuminate\Http\Response
    *
    */
    public function show($id){
        $student = Student::find($id);

        // The student is not found return an error page..
        if($student == null){
            $message = "There is no student with a student id of ".$id;
            return view("404.404",compact("message"));
        }
        $contact_person = $student->application->contact_person;
        return view('dashboard.students-show',compact('student','contact_person'));
    }

    


    /**
    * The student registration is a two step process, and this method continues from the first part of the student registration process.
    * 
    * @param StudentAdmissionRequest $request
    * @return \Illuminate\Http\Response
    */
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

    /**
    * search's students based on the provided key value pairs (#ex: $key:'first_name',$value='rob').
    * @param string $key
    * @param string $value
    */
    public function searchStudent($key,$value){
        $students = Student::with('application')->with('program')->with("department")->where($key,'LIKE','%'.$value.'%')->join('applications','students.application_id','=','applications.id')->get();
        return response()->json($students);
    }

    /**
    * Filters students based on the provided parameters.
    * @param int $program_id
    * @param int $department_id
    * @param int admission
    * @return \Illuminate\Http\Response
    */
    public function filterStudents($program_id,$department_id,$admission=null){
        $students = $this->filter($program_id,$department_id,$admission);

        $page = LengthAwarePaginator::resolveCurrentPage();
        $total = $students->count();
        $perPage = 5;
        $result = $students;
        $result = $result->forPage($page,$perPage);
        $students = new LengthAwarePaginator($result,$total,$perPage,$page,['path'=>LengthAwarePaginator::resolveCurrentPage(),]);
        return response()->json($students);
    }

    /**
    * deletes the specfied student and related information from the database.
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){

        $student = Student::find($id);
        $student->application()->delete();
        $student->admittedlist()->delete();
        $student->delete();
        return response()->json($student);
    }


    /**
    * Exports students reports into a PDF file based on the specified parameters.
    * @param int $program_id
    * @param int $department
    * @param int $admission
    * @return\Illuminate\Http\Response
    */
    public function report($program_id = null,$department=null,$admission=null){

            $students = $this->filter($program_id,$department,$admission);
            $pdf = PDF::loadView("dashboard.student-report",compact('students'));
            return $pdf->stream('student-list.pdf');
    }

    /**
    * Filters down students based on the specified parameters.
    * @param int $program
    * @param int $department
    * @param int $admission
    * @return Model $students; 
    */
    public function filter($program = null,$department=null,$admission=null){
        $students = Student::with('application')->with('department')->with('program')
                                ->join('applications','students.application_id','=','applications.id')
                                ->join('departments','students.department_id','=','departments.id')
                                ->join('programs','students.program_id','=','programs.id');

        if(!is_null($program))
            $students->where('programs.id','=',$program);

        if(!is_null($department))
            $students->where('departments.id','=',$department);

        if(!is_null($admission))
            $students->where('admission_id','=',$admission);

        $students = $students->get(['students.*']);

        return $students;
    }
}
