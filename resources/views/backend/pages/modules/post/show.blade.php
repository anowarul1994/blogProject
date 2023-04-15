@extends('backend.layout.master')

@section('page_title', 'Post Details')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Post Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped table-info">
                        <tr>
                            <th>ID</th>
                            <td>{{$post->id}}</td>


                            <th>Category Name</th>
                            <td>{{ $post->category->name }}</td>

                            <th>Sub Category Name</th>
                            <td>{{ $post->subCategory->name }}</td>

                            <th>Slug ID</th>
                            <td>{{ $post->slug_id }}</td>

                            <th>Status</th>
                            <td>{{ $post->status==1 ?'Published':"Unpublished" }}</td>

                        </tr>

                        <tr>
                            <th >Slug</th>
                            <td colspan="9">{{ $post->slug }}</td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td colspan="9">{{$post->name}}</td>
                        </tr>




                        <tr>

                        </tr>
                        <tr>
                            <th >Description</th>
                            <td colspan="9">{!! $post->description !!} </td>
                        </tr>

                        <tr>
                            <th >Photo</th>
                            <td colspan="9"><img src="{{ asset('image/uploads/thumbnail/'.$post->photo) }}" alt=""></td>
                        </tr>
                        <tr>

                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td  colspan="3">{{ $post->created_at->toDayDateTimeString() }}</td>

                            <th>Updated At</th>
                            <td  colspan="3">{{ $post->updated_at == $post->created_at? 'Not Updated':$post->updated_at->toDayDateTimeString() }}</td>

                            <th>Deteted At</th>
                            <td  colspan="4">{{ $post->deleted_at == null? 'Not Deleted':$post->deleted_at->toDayDateTimeString() }}</td>
                        </tr>

                    </table>
                    <a href="{{route("posts.index")}}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>


@endsection
