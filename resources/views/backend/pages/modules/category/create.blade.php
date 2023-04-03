@extends('backend.layout.master')

@section('page_title', 'Create Category')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create new category</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}

                    @include('backend.pages.modules.category.form')
                    {!! Form::button('<i class="fa-solid fa-square-plus"></i> Create New Category',['class'=>'btn btn-sm btn-success mt-3' ,'type'=>'submit'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection