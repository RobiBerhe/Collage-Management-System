<?php
/**
 * Created by PhpStorm.
 * User: robi
 * Date: 9/21/2018
 * Time: 1:11 AM
 */
?>
@extends("layouts.main")

@section('content')

    <div class="container">
        <div class="logo-wrapper">
            <div class="micro-logo">
                {{--<h4>Microlink Information Technology collage and business collage</h4>--}}
                <img src="{{asset('images/logo.jpg')}}" alt="" class="img-fluid img-thumbnail" style="border: 0px;">
            </div>
            <div class="nav-links clearfix">
                <ul>
                    <li><a href="#">NEWS FEED</a></li>
                    <li><a href="#">LINK 2</a></li>
                    <li><a href="#">LINK 3</a></li>
                    <li><a href="#">LINK 4</a></li>
                </ul>
            </div>

        </div>

    </div>


@endsection
