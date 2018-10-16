<?php
/**
 * Created by PhpStorm.
 * User: robi
 * Date: 9/21/2018
 * Time: 1:09 PM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>window.Laravel = {csrfToken:'{{csrf_token()}}'}</script>
    <title>Dashboard</title>
    @section('styles')
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
        <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
        <link rel="stylesheet" href="{{asset('css/design.css')}}">

    @show
    {{-- <link rel="stylesheet" href="{{asset('css/welcome.css')}}"> --}}
</head>
<body>
    <header>
        <div class="navbar-fixed">
            <nav class="red darken-2">
                <div class="nav-wrapper">
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons left">menu</i></a>
                    <a href="#" class="brand-logo">CMIS</a>
                    <ul class="right hide-on-med-and-down">
                        {{--    <li><a href="#">Link 1</a></li>
                           <li><a href="#">Link 2</a></li>
                           <li><a href="#">Link 3</a></li> --}}
                        <li><a href="#" class="dropdown-trigger" data-target="useractions"><i class="material-icons right">chevron_right</i>{{Auth::user()->name}}</a></li>
                        <ul id="useractions" class="dropdown-content">
                            <li><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit()"><i class="material-icons left">whatshot</i>Log out</a></li>
                            <form action="{{route('logout')}}" method="POST" id="logout-form" style="display: none;">
                                @csrf
                            </form>
                            <li class="divider" tabindex="-1"></li>
                        </ul>
                    </ul>
                </div>
            </nav>
        </div>
        <ul class="sidenav" id="mobile-nav">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
        </ul>
    </header>
    @include('includes.sidebar')

    @yield('content')






<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="{{asset('js/init.js')}}"></script>
<script>
</script>

@yield('scripts')
</body>
</html>
