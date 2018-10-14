<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Students Report</title>
	<style>

		body {
			position: relative;
		}
		.table {
			margin: 0;
			width: 100%;
			display: table;
			padding: 8px 16px;
			border-radius: 4px;
			border: none;
			font-size: 14px;
			border-collapse: collapse;
			position: absolute;
			top: 31px;
			left: 0;
		}
		
		.table th, td {
			border: 1px solid #c9c9c9;
			padding: 8px 16px;
			text-align: center;
			align-content: center;
		}

		thead {
			/*background-color: #367;*/
			background-color: #034f84;
			border: 0px;
			color: #fff;
		}
		.table th {
			font-weight: 800;
			border: none;
		}
		

		.report-title {
			position: absolute;
			width: 100%;
			top: 0;
			left: 15.55px;
			right: 15.55px;
			padding: 8px 16px;
			background-color: #0066cc; /*#005960 */
			color: #fff;
		}
		header {
			/*margin: 0;*/
			padding: 1px;
			color: #fff;
			background-color: rgba(255, 0, 0, 0.8);
			border-left: 3px solid #a01;
		}	
		body {
			padding: 0;
			margin: 0;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
				<h3 class="report-title">Students List</h3>
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