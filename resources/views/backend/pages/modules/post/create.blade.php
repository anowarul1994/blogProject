@extends('backend.layout.master')

@section('page_title', 'Create Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create new Post</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'posts.store', 'method'=>'POST']) !!}

                    @include('backend.pages.modules.post.form')


                    {!! Form::button('<i class="fa-solid fa-square-plus"></i> Create New Post',['class'=>'btn btn-sm btn-success mt-3' ,'type'=>'submit'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
