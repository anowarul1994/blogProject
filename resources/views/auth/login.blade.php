@extends('backend.layout.auth_master')
@section('page_title', 'Login')

@section('content')
    {!! Form::open(['route'=>'login', 'method'=>'post']) !!}
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Your Email']) !!}
    {!! Form::label('password', 'Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password', ['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Your password']) !!}
    {!! Form::button('Login', ['class'=>'btn btn-success btn-sm mt-3', 'type'=>'submit']) !!}
    {!! Form::close() !!}
    <p class="mt-2">Not a member? <a href="{{ route('register') }}">Register here</a></p>
@endsection
