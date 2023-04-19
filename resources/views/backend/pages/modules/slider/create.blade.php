@extends('backend.layout.master')

@section('page_title', 'Create New Slider')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-0">Create New Slider</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('sliders.index') }}"><button class="btn  btn-sm btn-outline-dark"><i class="fa-solid fa-list"></i> List </button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'sliders.store', 'method'=>'POST', 'files'=>true]) !!}

                    @include('backend.pages.modules.slider.form')
                    {!! Form::button('<i class="fa-solid fa-square-plus"></i> Create New Slider',['class'=>'btn btn-sm btn-success mt-3' ,'type'=>'submit'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
