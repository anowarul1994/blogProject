@extends('backend.layout.master')

@section('page_title', 'Category Details')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Category List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ID</th>
                            <td>{{$category->id}}</td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $category->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug ID</th>
                            <td>{{ $category->slug_id }}</td>
                        </tr>
                        <tr>
                            <th>Order By</th>
                            <td>{{ $category->order_by }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $category->status==1 ?'Published':"Unpublished" }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $category->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $category->updated_at == $category->created_at? 'Not Updated':$category->updated_at->toDayDateTimeString() }}</td>
                        </tr>

                    </table>
                    <a href="{{route("categories.index")}}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>


@endsection
