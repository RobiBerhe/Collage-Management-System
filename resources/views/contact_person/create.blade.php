@extends("layouts.dashboard")

@section('content')


	<div class="container" id="app">
		<div class="row">
			<div class="row"></div>
			<div class="white col m10 offset-m2 z-depth-1">
				<p>The contact person will be created for:
					<strong>{{$student_application->first_name." ".$student_application->middle_name}}</strong>
					</p>
				<form action="{{route("contacts.store")}}" method="POST">
					@csrf
					<input type="hidden" name="application_id" value="{{$student_application->id}}">
					<div class="input-field col m6">
						<input type="text" name="first_name" id="first_name">
						<label for="first_name">First Name <span class="helper-text blue-text right">*</span></label>
						@if($errors->has('first_name'))
							<span class="helper-text red-text">{{$errors->first('first_name')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<input type="text" name="middle_name" id="middle_name">
						<label for="middle_name">Middle Name <span class="helper-text blue-text right">*</span></label>
						@if($errors->has('middle_name'))
							<span class="helper-text red-text">{{$errors->first('middle_name')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<input type="text" name="last_name" id="last_name">
						<label for="last_name">Last Name <span class="helper-text blue-text right">*</span></label>
						@if($errors->has('last_name'))
							<span class="helper-text red-text">{{$errors->first('last_name')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<input type="text" name="city" id="city">
						<label for="city">City <span class="helper-text blue-text right">*</span></label>
						@if($errors->has('city'))
							<span class="helper-text red-text">{{$errors->first('city')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<input type="text" name="sub_city" id="sub_city">
						<label for="sub_city">Sub city <span class="helper-text blue-text right">*</span></label>
						@if($errors->has('sub_city'))
							<span class="helper-text red-text">{{$errors->first('sub_city')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<input type="text" name="kebele" id="kebele">
						<label for="kebele">Kebele <span class="helper-text blue-text right">*</span></label>
						@if($errors->has('kebele'))
							<span class="helper-text red-text">{{$errors->first('kebele')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<input type="text" name="house_num" id="house_num">
						<label for="house_num">House Number </label>
					</div>
					<div class="input-field col m6">
						<input type="text" name="phone_home" id="phone_home">
						<label for="phone_home">Home Phone <span class="helper-text blue-text right">*</span></label>
						@if($errors->has('phone_home'))
							<span class="helper-text red-text">{{$errors->first('phone_home')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<input type="text" name="phone_office" id="phone_office">
						<label for="phone_office">Office Phone</label>
						@if($errors->has('phone_office'))
							<span class="helper-text red-text">{{$errors->first('phone_office')}}</span>
						@endif
					</div>
					<div class="input-field col m6">
						<button class="btn red darken-2 btn-block waves-effect waves-light">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>





@endsection