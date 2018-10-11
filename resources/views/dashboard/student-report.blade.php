<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Students Report</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
	<link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
	<link rel="stylesheet" href="{{asset('css/design.css')}}">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col m10 white z-depth-5">
				<h5 class="card-title">Students report.</h5>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
						</tr>
					</thead>
					<tbody>
						@foreach($students as $student)
							<tr>
								<td>{{$student->id}}</td>
								<td>{{$student->application->first_name}}</td>
								<td>{{$student->application->last_name}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>



<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>

</body>
</html>