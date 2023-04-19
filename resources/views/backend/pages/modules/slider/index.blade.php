@extends('backend.layout.master')

@section('page_title', 'Slider List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-0">Slider List</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('sliders.create') }}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i> Add New </button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="width: 80vw; font-size: 14px">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Slider Title</th>
                                <th class="text-center">Slider Content</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Order By</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Created & Updated</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td class="align-middle text-center p-0">{{ $loop->index+1 }}</td>
                                <td class="align-middle p-0">{{ $slider->title }}</td>
                                <td class="align-middle p-0">{{ $slider->content }}</td>
                                
                                <td class="align-middle text-center p-0">
                                    @if($slider->status == 1)
                                        <span class="badge bg-primary">Active</span>
                                    @else
                                        <span class=" mb-0 badge text-danger bg-warning">Unactive</span>
                                    @endif

                                </td>
                                <td class="align-middle text-center p-0">{{ $slider->order_by }}</td>
                                <td class="align-middle text-center p-0">
                                    <img width="50px" src="{{ asset('image/uploads/slider/'.$slider->photo) }}" alt="">
                                </td>
                                <td class="align-middle p-0">
                                    <small class="m-0 text-info">{{ $slider->created_at->toDayDateTimeString() }}</small> <br>
                                    <small class="m-0 text-primary">{{ $slider->updated_at==$slider->created_at?'Not Updated':$slider->updated_at->toDayDateTimeString() }}</small>
                                </td>
                                <td class="align-middle d-flex" style="padding: 8px 0 0 5px;">

                                    <a href="{{ route('sliders.show', $slider->id) }}">
                                        <button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
                                    </a>
                                    <a class="px-1" href="{{ route('sliders.edit', $slider->id) }}">
                                        <button class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                                    </a>
                                    <div>
                                        {!! Form::open(['route'=>['sliders.destroy',$slider->id], 'method'=>'delete', 'id'=>'slider_delete_form_'.$slider->id]) !!}
                                        {!! Form::button('<i class="fa-solid fa-trash"></i>',['type'=>'button', 'data-id'=>$slider->id, 'id'=> 'slider_delete_button_'.$slider->id, 'class'=>'btn btn-sm btn-danger slider-delete-button']) !!}
                                        {!! Form::close() !!}
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $('.slider-delete-button').on('click', function(){
                let id= $(this).attr('data-id')

            Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to delete it?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#slider_delete_form_'+id).submit()  //form submit for js
                    }
                })
            })
        </script>
    @endpush

    @if (Session::has('msg'))
        @push('script')
            <script>
                Swal.fire({
                position: 'top-end',
                icon: '<?php echo session('cls')?>',
                toast: true,
                title: '<?php echo session('msg')?>',
                showConfirmButton: false,
                timer: 5000
                })
            </script>

        @endpush

    @endif


@endsection
