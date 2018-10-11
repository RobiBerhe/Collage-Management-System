<?php
/**
 * Created by PhpStorm.
 * User: robi
 * Date: 9/21/2018
 * Time: 1:12 AM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome- Microlink Information technology and business collage</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/design.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
</head>
<body>
    <div class="navbar-fixed">
        <nav class="yellow darken-3">
            <div class="nav-wrapper">
                <a href="#!" class="sidenav-trigger" data-target="mobile-nav"><i class="material-icons left">menu</i></a>
                <a href="/" class="brand-logo">Microlink</a>
                @guest
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{route('register')}}">REGISTER</a></li>
                        <li><a href="{{route('login')}}">LOG IN</a></li>
                    </ul>
                @endguest
            </div>
        </nav>

    </div>
    <div class="nav-wrapper">
        <ul class="sidenav" id="mobile-nav">
            <li><a href="#">register</a></li>
            <li><a href="#">log in</a></li>
        </ul>
    </div>

   @yield('content')






<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>

<script>
$(document).ready(function(){
    $('.sidenav').sidenav();
});

</script>

</body>
</html>
