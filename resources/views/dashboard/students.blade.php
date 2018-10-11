<?php
/**
 * Created by PhpStorm.
 * User: robi
 * Date: 9/22/2018
 * Time: 12:23 PM
 */
?>
@extends('layouts.dashboard')
@section('content')
    <div class="container" id="app">
        <div class="row">
            <br>
            <div class="white col m12 offset-m1">
                <a class="btn red darken-1 waves-effect  waves-ripple waves-purple white-text" href="{{route('students.create')}}">Register a student</a>
                <div class="row"></div>
            </div>
            {{-- <div class="row"> --}}
                <div class="white col m12  offset-m1">
                    <form action="#" method="POST">
                        <p>Filter: </p>
                        <div class="row">
                            <div class="input-field col m3">
                                <select name="programs" id="programs">
                                    <option value="" disabled selected>Choose program</option>
                                    @foreach($programs as $program)
                                        <option value="{{$program->id}}">{{$program->program_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col m4">
                                <select name="departments" id="department">
                                    <option value="" disabled selected="">choose department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                                    @endforeach
                                </select>
                                <label for="department">Department</label>
                            </div>   
                            <div class="input-field col m3">
                                <select name="admission" id="admission">
                                    <option value="" disabled selected=>choose admission</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Extension">Extension</option>
                                </select>
                            </div> 
                        </div>

                        
                    </form>
                </div>
            {{-- </div> --}}
            <div class="white col m12 offset-m1">
                <table class="table striped highlight responsive-table" id="table-student">
                    <thead>
                        <tr>
                            <th onclick="sortTable('table-student',0)">ID</th>
                            <th onclick="sortTable('table-student',1)"><i class="material-icons right">sort</i>First Name</th>
                            <th onclick="sortTable('table-student',2)"><i class="material-icons right">sort</i>Last Name</th>
                            <th onclick="sortTable('table-student',3)"><i class="material-icons right">sort</i>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->application->first_name}}</td>
                                <td>{{$student->application->last_name}}</td>
                                <td>{{$student->department->department_name}}</td>
                                <td><a href="#delete-confirm" onclick="setStudentId(this)" class="modal-trigger" ><i class="red-text material-icons right">delete</i><input type="hidden" value="{{$student->id}}"></a></td>
                            </tr>
                                @empty
                                <p>There are no students registered yet!</p>
                         @endforelse
                    </tbody>
                </table>
                <div class="col m6 offset-m4">
                    {{$students->links()}}
                </div>
            </div>
        </div>
        

        <div id="delete-confirm" class="modal">
            <div class="modal-content">
                <h4>Are you sure?</h4>
                <p>are you sure you want to delete this student?</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close btn grey darken-3 waves-effect waves-light white-text"><i class="material-icons left">cancel</i>No</a>&nbsp;&nbsp;
                <a href="#!" onclick="confirmDelete(); document.getElementById('delete-form').submit();" class="modal-close btn red waves-effect waves-light white-text"><i class="material-icons left">delete</i>Yes</a>
        </div>
        <form action="#!" method="POST" id="delete-form">
            @csrf
            {{method_field("delete")}}
            <input type="hidden" name="id" id="std_id">
        </form>
    </div>
        

    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/helper.js')}}"></script>
@endsection