<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Students Report</title>
	<style>

		.table {
			width: 100%;
			display: table;
			padding: 8px 16px;
			border-radius: 4px;
			border: none;
			font-size: 16px;
			border-collapse: collapse;
		}
		thead {
			background-color: #367;
			color: #fff;
		}
		th {
			font-weight: 800;
		}
		.table th, td {
			border: 1px solid #c9c9c9;
			padding: 8px 16px;
		}

		.report-title {
			padding: 8px 16px;

		}
		
	</style>
</head>
<body>
	
	<div class="container">
		<div class="row">
			{{-- <div class="col m10 white z-depth-5"> --}}
				<h3 class="report-title">Students Report</h3>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Department</th>
							<th>Admission</th>
						</tr>
					</thead>
					<tbody>
						@foreach($students as $student)
							<tr>
								<td>{{$student->id}}</td>
								<td>{{$student->application->first_name}}</td>
								<td>{{$student->application->last_name}}</td>
								<td>{{$student->department->department_name}}</td>
								<td>{{$student->admission->admission_name}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>



{{-- <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script> --}}

</body>
</html>