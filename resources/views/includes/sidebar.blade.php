<?php
/**
 * Created by PhpStorm.
 * User: robi
 * Date: 9/22/2018
 * Time: 7:38 AM
 */
?>
<nav class="sidebar hide-on-med-and-down red darken-3">
    <div class="profile-info">
        <img src="{{asset('images/user.png')}}" alt="profile picture" class="circle img-fluid">
        <p>{{Auth::user()->name}}</p>
        {{--<span class="badge badge-primary left">{{Auth::user()->role->name}}</span>--}}
        <p>{{Auth::user()->email}}</p>
    </div>
    <ul class="sidebar-links">
        <li><a href="/dashboard"><i class="material-icons left">dashboard</i>Dashboard</a></li>
        <li><a href="{{route('students.index')}}"><i class="material-icons left">create</i>Students</a></li>
        <li><a href="#"><i class="material-icons left">create</i>Courses</a></li>
        <li><a href="#"><i class="material-icons left">create</i>Registrar</a></li>
        <li><a href="#"><i class="material-icons left">create</i>Instructors</a></li>
        <ul class="collapsible">
            <li class=""><i class="material-icons left">whatshot</i><i class="material-icons right add">add</i>
                <a href="#" class="collapsible-header">Users</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </ul>
    <footer class="copyright-notice">
        <p>&copy; Microlink College</p>
    </footer>
</nav>
