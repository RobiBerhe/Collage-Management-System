<?php
/**
 * Created by PhpStorm.
 * User: robi
 * Date: 9/23/2018
 * Time: 7:29 AM
 */
?>
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
            <div class="row"></div>
            <div class="white col m12 offset-m1">
                <a href="{{route('students.create')}}" class="btn red darken-1 white-text waves-effect waves-ripple waves-purple">Register a student</a>
            </div>
            <div class="white col m12 offset-m1">
                <students></students>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{asset('js/main.js')}}"></script>
@endsection