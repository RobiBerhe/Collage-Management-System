<?php

namespace App\Http\Controllers\contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
use App\ContactPerson;
use App\Http\Requests\ContactPersonCreate;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $student_application = Application::find($id);
        if($student_application == null){
            $message = "There has not been any student registered with the application id ".$id;
            return view("404.404",compact('message'));
        }
        return view("contact_person.create",compact('student_application'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactPersonCreate $request)
    {
        // dd($request);
        $contact_person = new ContactPerson([
            'application_id'=>$request->application_id,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'city'=>$request->city,
            'kfle_ketema'=>$request->sub_city,
            'kebele'=>$request->kebele,
            'telephone_home'=>$request->phone_home,
        ]);
        $contact_person->save();
        return redirect("/students/".$request->get("application_id")."/");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
