@extends('backend.layout.master')

@section('page_title', 'Category Details')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Category Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>ID</th>
                            <td>{{$subCategory->id}}</td>
                        </tr>
                        <tr>
                            <th>Sub Category Name</th>
                            <td>{{ $subCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Category Name</th>
                            <td>{{ $subCategory->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug ID</th>
                            <td>{{ $subCategory->slug_id }}</td>
                        </tr>
                        <tr>
                            <th>Order By</th>
                            <td>{{ $subCategory->order_by }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $subCategory->status==1 ?'Published':"Unpublished" }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $subCategory->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $subCategory->updated_at == $subCategory->created_at? 'Not Updated':$subCategory->updated_at->toDayDateTimeString() }}</td>
                        </tr>

                    </table>
                    <a href="{{route("sub-categories.index")}}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>


@endsection
