@extends("layouts.dashboard")

@section("content")
<div class="row" id="app"></div>
	<div class="container" id="student-create">
		<div class="row"></div>
		<div class="row">
			<div class="col m11 offset-m1 white">
				<form action="{{route('storeStudent')}}" method="POST">
					@csrf
					<input type="hidden" value="{{$lastStudentApplication->id}}" name="student_application_id">
					<div class="row">
						<div class="col m10 offset-m1">
							{{-- put the single student application info here. --}}
							{{-- <student></student> --}}
								<div class="row">
								<div class="row">
									<div class="input-field col m6">
										<input type="text" class="datepicker" id="date_of_admission" name="date_of_admission">
										<label for="date_of_admission">Date of Admission</label>
										@if($errors->has('date_of_admission'))
											<span class="helper-text red-text">{{$errors->first('date_of_admission')}}</span>
										@endif
									</div>
									<div class="input-field col m6">
										<input type="text" name="graduation_year" id="graduation_year" class="datepicker">
										<label for="graduation_year">Graduation Year</label>
										@if($errors->has('graduation_year'))
											<span class="helper-text red-text">{{$errors->first('graduation_year')}}</span>
										@endif
									</div>
								</div>
								<div class="row">
									<div class="input-field col m6">
										<select name="program" id="program" v-model="program" v-on:change="getDepartments">
											<option value="" disabled selected>Choose Program</option>
											@foreach($programs as $program)
												<option value="{{$program->id}}">{{$program->program_name}}</option>
											@endforeach
										</select>
										<label>Program</label>
										@if($errors->has('program'))
											<span class="helper-text red-text">{{$errors->first('program')}}</span>
										@endif
									</div>
									<div class="input-field col m6">
										<div class="row">
											<div class="col m12">
												<select class="browser-default form-control" name="department" id="department"  v-model="department" >
													<option value="" disabled>Choose a department</option>
													<option v-for="department in departments" v-bind:value="department.id">@{{department.department_name}}</option>
												</select>
												<label>Department</label>
												@if($errors->has('department'))
													<span class="helper-text red-text">{{$errors->first('department')}}</span>
												@endif
											</div>
										</div>
									</div>
									<div class="input-field col m6">
										<select name="admission" id="admission" v-on:change="getSections" v-model="admission">
											<option value="" disabled selected>Choose Admission</option>
											@foreach($admissions as $admission)
												<option value="{{$admission->id}}">{{$admission->admission_name}}</option>
											@endforeach
										</select>
										<label>Admission</label>
										@if($errors->has('admission'))
											<span class="helper-text red-text">{{$errors->first('admission')}}</span>
										@endif
									</div>
									<div class="input-field col m6">
										<div class="row">
											<div class="col m12">
												<select class="browser-default form-control" v-bind:disabled="(department =='') || (admission=='')" name="section" v-model="section" v-on:change="getNumberOfStudents">
													<option value="" disabled selected>Choose section</option>
													<option v-for="section in sections" v-bind:value="section.id">@{{section.section_name}}</option>
												</select>
												<label>Section</label>
												@if($errors->has('section'))
													<span class="helper-text red-text">{{$errors->first('section')}}</span>
												@endif
											</div>
											<div class="col m5" v-if="section"><span>@{{number_of_students}} number of students</span></div>
												<div class="col m1" id="preloader">
													<div class="preloader-wrapper small active">
												    <div class="spinner-layer spinner-green-only">
													      <div class="circle-clipper left">
													       	 <div class="circle"></div>
													      </div>
												    <div class="gap-patch">
												        <div class="circle"></div>
												    </div>
												    <div class="circle-clipper right">
												        <div class="circle"></div>
												    </div>
												    </div>
												</div>
											</div>	
										</div>
									</div>
									<div class="input-field col m6 offset-m5">
										<button class="btn waves-effect waves-light red darken-2" type="submit"><i class="material-icons left">save</i>Save</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{asset('js/student-info.js')}}"></script>
@endsection

