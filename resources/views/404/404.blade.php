<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Error</title>
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
	<link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
		
	<style>
		body {
			position: relative;
			background-color: #ececec;
			padding-top: 12%;
		}
		.jumbotron {
			text-align: center;
		}
	</style>


</head>
<body>
	<div class="container">		
		<div class="jumbotron red">
			<h4 class="white-text accent-4">{{$message}}</h4>
		</div>
	</div>

</body>
</html>