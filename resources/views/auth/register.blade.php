@extends('backend.layout.auth_master')
@section('page_title', 'Register')

@section('content')
    {!! Form::open(['route'=>'register', 'method'=>'post']) !!}
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Your Name']) !!}

    {!! Form::label('email', 'Email', ['class'=>'mt-3']) !!}
    {!! Form::text('email', null, ['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Your Email']) !!}

    {!! Form::label('password', 'Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password', ['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Your Password']) !!}

    {!! Form::label('password_confirmation', 'Retype Password', ['class'=>'mt-3']) !!}
    {!! Form::password('password_confirmation', ['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Your Confirm Password']) !!}

    {!! Form::button('Register', ['class'=>'btn btn-success btn-sm mt-3', 'type'=>'submit']) !!}
    {!! Form::close() !!}
    <p class="mt-2">Already Member? <a href="{{ route('login') }}">Login here</a></p>
@endsection
