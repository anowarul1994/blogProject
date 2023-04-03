@extends('backend.layout.master')

@section('page_title', 'Edit Category')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit category</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($category,['route'=>['categories.update', $category->id], 'method'=>'put']) !!}

                    @include('backend.pages.modules.category.form')
                    {!! Form::button('<i class="fa-solid fa-square-plus"></i> Update Category',['class'=>'btn btn-sm btn-success mt-3' ,'type'=>'submit'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
