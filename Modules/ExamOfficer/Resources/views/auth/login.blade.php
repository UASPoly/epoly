
@extends('layouts.minimal')
@section('title')
    Sokoto state poly admin lonin page
@endsection
@section('page-content')
    <br><br>
    <section class="">
        <div class="grid-row">
            <div class="login-block">
                @if ($errors->any())
                <div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="logo">
                    <img src="{{asset('img/logo.png')}}">
                    <h2>Exam Officer Login</h2>
                </div>
                <form class="login-form" action="{{route('exam.officer.login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email" class="login-input" placeholder="email">
                        <span class="input-icon">
                            <i class="fa fa-user"></i>
                        </span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="login-input" placeholder="Pasword">
                        <span class="input-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <p class="">
                        <a href="{{ route('password.request') }}">Forgot Password ?</a>
                    </p>
                    <button class="button-fullwidth cws-button bt-color-3 alt">{{ __('Login') }}</button>
                    
                    <a href="{{route('welcome')}}" class="button-fullwidth cws-button bt-color-3">Home</a>
                </form>
            </div>
        </div>
    </section>
@endsection    