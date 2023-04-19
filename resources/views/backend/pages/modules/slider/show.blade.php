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
                            <td>{{$slider->id}}</td>
                        </tr>
                        <tr>
                            <th>Slider title</th>
                            <td>{{ $slider->title }}</td>
                        </tr>
                        <tr>
                            <th>Slider Content</th>
                            <td>{{ $slider->content }}</td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><img width="100px" src="{{ asset('image/uploads/slider/'.$slider->photo) }}" alt=""></td>
                        </tr>
                        
                        <tr>
                            <th>Order By</th>
                            <td>{{ $slider->order_by }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $slider->status==1 ?'Active':"Unactive" }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $slider->created_at->toDayDateTimeString() }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $slider->updated_at == $slider->created_at? 'Not Updated':$slider->updated_at->toDayDateTimeString() }}</td>
                        </tr>

                    </table>
                    <a href="{{route("sliders.index")}}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-arrow-left"></i> Back</button></a>
                </div>
            </div>
        </div>
    </div>


@endsection
