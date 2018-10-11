<?php
/**
 * Created by PhpStorm.
 * User: robi
 * Date: 9/21/2018
 * Time: 1:24 PM
 */
?>
@extends("layouts.dashboard")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m12">
                <h4 class="">Welcome to your dashboard!</h4>
            </div>
        </div>
        <div class="row">
            <div class="col m6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Students</span>
                        <p>You can manage a student's basic information, register new students</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('students.index')}}" class="yellow darken-3 btn waves-effect waves-light white-text">students</a>
                    </div>
                </div>
            </div>
            <div class="col m6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Courses</span>
                        <p>You can manage the courses which are to be taken by students,</p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="btn waves-effect waves-light yellow darken-3 white-text">Courses</a>
                    </div>
                </div>
            </div>
            <div class="col m6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Instructors</span>
                        <p>You can manage the instructors assign courses to the instructors,</p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="btn waves-effect waves-light yellow darken-3 white-text">Instructors</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
