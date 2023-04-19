@extends('backend.layout.master')

@section('page_title', 'Edit Slider')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Slider</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($slider,['route'=>['sliders.update', $slider->id], 'method'=>'put', 'files'=>true]) !!}

                    @include('backend.pages.modules.slider.form') </br>
                   <div><img class="img-fluid" width="500px" src="{{ asset('image/uploads/slider/'.$slider->photo) }}" alt=""></div> 
                    {!! Form::button('<i class="fa-solid fa-square-plus"></i> Update Slider',['class'=>'btn btn-sm btn-warning mt-3' ,'type'=>'submit'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
