@extends('layouts.dashboard')

@section('styles')
	@parent 
	<link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
@endsection


@section('content')

	<div class="container" id="app">
		<div class="row">
			<div class="col m10 offset-m2">
				<div class="card white">
					<p><a href="/students/" class="btn red darken-2 white-text">View all</a></p>
					<div class="card-content">
						<div class="row">
							<div class="col m4">
								{{-- <div class="row"></div> --}}
								<span class="card-title" style="font-size: 20px">Student Picture</span>
								<hr>
								<div class="row">
									<studentprofile stid="{{$student->id}}"></studentprofile>
								</div>
							</div>
							<div class="col m8">
								<ul class="tabs">
									<li class="tab col m6"><a href="#student-info">Basic Info</a></li>
									<li class="tab col m6"><a href="#student-detail">Details</a></li>
								</ul>
								<div id="student-info">
								<div class="row"></div>
								<span class="card-title">Personal Info</span>
								<hr>
								<p>Application ID: <strong>{{$student->application->id}}</strong></p>
								<p>Student ID: <strong>{{$student->id}}</strong></p>
								<p>Name: <strong>{{$student->application->first_name}}</strong></p>
								<p>Middle Name: <strong>{{$student->application->middle_name}}</strong></p>
								<p>Last Name: <strong>{{$student->application->last_name}}</strong></p>
								<p>Gender: <strong>{{$student->application->sex}}</strong></p>
								<div class="row"></div>
								<span class="card-title">Contact Person Info</span>
								<hr>
								@if(is_null($contact_person))
									<p>there is no contact person available for this student.</p>
									<p>
									 <a href="{{route('contacts.create',$student->application->id)}}" data-position="bottom" data-tooltip="This will be used incase of emergencies" class="btn red darken-2 white-text waves-effect waves-light tooltipped">Add contact person</a>
									</p>
								@else
									<p>Contact Person Full Name : <strong>{{$contact_person->first_name." ".$contact_person->middle_name}}</strong></p>
									<p>Contact Person Phone Number : <strong>{{$contact_person->telephone_home}}</strong></p>
								@endif
							</div>
							<div id="student-detail">
								<div class="row"></div>
								<span class="card-title">Details</span>
								<hr>
								<p>Program: <strong>{{$student->program->program_name}}</strong></p>
								<p>Department: <strong>{{$student->department->department_name}}</strong></p>
								<p>Admission: <strong>{{$student->admission->admission_name}}</strong></p>
								<p>Section: <strong>{{$student->section->section_name}}</strong></p>
								<p>Admission Date: <strong>{{$student->admittedlist->date_of_admission}}</strong></p>
								<p>Graduation Year: <strong>{{$student->admittedlist->graduation_year}}</strong></p>

							</div>
							</div>
							
						</div>
						
					</div>
					<div class="card-action">
						<a href="#" class="btn orange accent-4 white-text waves-effect waves-light">Link 1</a>
						<a href="#" class="btn orange accent-4 white-text waves-effect waves-light">Link 2</a>
					</div>
				</div>
			</div>
		</div>

	








	</div>

	

@endsection

@section('scripts')
	<script src="{{asset('js/main.js')}}"></script> {{-- we will remove this latter.--}}
	<script>
		// document.addEventListener('click',function(){
		// 	alert("HELLO WORLD !!!");
		// });
	</script>
@endsection