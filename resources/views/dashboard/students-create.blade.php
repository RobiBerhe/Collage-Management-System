@extends("layouts.dashboard")

@section("content")

<div id="app"></div>
<div class="container" id="student-create">
	<div class="row"></div>
	<div class="row">
		<div class="red darken-2 white-text col m10 offset-m2">
			<h5>Register Student</h5>
		</div>
		<div class="white student-form col m10 offset-m2">
			<form action="{{route('students.store')}}" method="POST">
				@csrf
				<div class="row">
					<div class="col m8 offset-m1">
						<div class="row">
							{{-- <div class="col m12 ">
								<div class="row"></div>
								@if($errors->any())
									@foreach($errors->all() as $error)
										<div class="alert alert-danger alert-dismissable fade show" role="alert">
											{{$error}} <button type="submit" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
										</div>
									@endforeach

								@endif
							</div> --}}
						</div>
						<div class="row">
							<div class="input-field col m6">
								<input type="text" id="first_name" name="first_name">
								<label for="first_name">First name</label>
								@if($errors->has("first_name"))
									<span class="helper-text red-text">{{$errors->first("first_name")}}</span>
								@endif
							</div>
							<div class="input-field col m6">
								<input type="text" id="middle_name" name="middle_name">
								<label for="middle_name">Middle name</label>
								@if($errors->has("middle_name"))
									<span class="helper-text red-text">{{$errors->first("middle_name")}}</span>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col m6">
								<input type="text" id="last_name" name="last_name">
								<label for="last_name">Last name</label>
								@if($errors->has("last_name"))
									<span class="helper-text red-text">{{$errors->first("last_name")}}</span>
								@endif
							</div>
							<div class="input-field col m6">
								<input type="text" id="date_of_birth" name="date_of_birth" class="datepicker">
								<label for="date_of_birth">Date of birth</label>
								@if($errors->has("date_of_birth"))
									<span class="helper-text red-text">{{$errors->first("date_of_birth")}}</span>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col m6">
								<input type="text" id="place" name="place_of_birth">
								<label for="place">Place of birth</label>
								@if($errors->has("place_of_birth"))
									<span class="helper-text red-text">{{$errors->first("place_of_birth")}}</span>
								@endif
							</div>
							<div class="input-field col m6">
									<div class="row">
										<div class="col m6">
											<label for="male">
												<input type="radio" name="gender" class="with-gap" id="male" value="male">
												<span>Male</span>
											</label> <br><br>
										</div>
										<div class="col m6">
											<label for="female">
												<input type="radio" name="gender" class="with-gap" value="femalte" id="female">
												<span>Female</span>
											</label>
										</div>
										<div class="col m12">
											@if($errors->has("gender"))
												<span class="helper-text red-text">{{$errors->first("gender")}}</span>
											@endif
										</div>
									</div>
								
							</div>
						</div>
						<div class="row">
							<div class="input-field col m6">
								<input type="text" name="city" id="city">
								<label for="city">City</label>
								@if($errors->has("city"))
									<span class="helper-text red-text">{{$errors->first("city")}}</span>
								@endif
							</div>
							<div class="input-field col m6">
								<input type="text" name="sub_city" id="sub_city">
								<label for="sub_city">Sub city</label>
								@if($errors->has("sub_city"))
									<span class="helper-text red-text">{{$errors->first("sub_city")}}</span>
								@endif
							</div>
						</div>
						<div class="row">
							{{-- <div class="input-field col m6">
								<input type="text" name="woreda" id="woreda">
								<label for="woreda">Woreda</label>
							</div> --}}
							<div class="input-field col m6">
								<input type="number" min="3" max="20" name="kebele" id="kebele">
								<label for="kebele">Kebele</label>
								@if($errors->has("kebele"))
									<span class="helper-text red-text">{{$errors->first("kebele")}}</span>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="input-field col m6 offset-m5">
								<button type="submit" class="btn waves-effect waves-light red darken-4"><i class="material-icons right">chevron_right</i>Continue</button>
							</div>
						</div>
					</div>
				</div>
			</form>
	</div>
	</div>
</div>
@endsection