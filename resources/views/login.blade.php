@extends('layouts.master')

@section('title', 'App - Top Page')

@section('style-libraries')
@stop

@section('styles')
    {{--custom css item suggest search--}}
    <link rel="stylesheet" href="{{mix('css/home/login.css')}}" />
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <img src="{{ asset('images/thor_dev.png') }}" id="icon" alt="User Icon" />
                        </div>

                        <!-- Login Form -->
                        <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">
                        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
                        <input type="submit" class="fadeIn fourth btn-login" value="Log In">
                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                            <a class="underlineHover" href="#">Forgot Password?</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('js/home/login.js')}}" ></script>
@stop