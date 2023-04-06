@extends('backend.layout.master')

@section('page_title', 'Sub Category List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-0">Sub Category List</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('sub-categories.create') }}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i> Add New </button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">SubCategory Name</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">Slug ID</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Order By</th>
                                <th class="text-center">Created & Updated</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $subcategory)
                            <tr>
                                <td class="align-middle text-center p-0">{{ $loop->index+1 }}</td>
                                <td class="align-middle p-0">{{ $subcategory->name }}</td>
                                <td class="align-middle p-0">{{ $subcategory->category->name }}</td>
                                <td class="align-middle p-0">{{ $subcategory->slug }}</td>
                                <td class="align-middle text-center p-0">{{ $subcategory->slug_id }}</td>
                                <td class="align-middle text-center p-0">
                                    @if($subcategory->status == 1)
                                        <span class="badge bg-primary">Published</span>
                                    @else
                                        <span class=" mb-0 badge text-danger bg-warning">Unpublished</span>
                                    @endif

                                </td>
                                <td class="align-middle text-center p-0">{{ $subcategory->order_by }}</td>
                                <td class="align-middle p-0">
                                    <small class="m-0 text-info">{{ $subcategory->created_at->toDayDateTimeString() }}</small> <br>
                                    <small class="m-0 text-primary">{{ $subcategory->updated_at==$subcategory->created_at?'Not Updated':$subcategory->updated_at->toDayDateTimeString() }}</small>
                                </td>
                                <td class="align-middle d-flex" style="padding: 8px 0 0 5px;">

                                    <a href="{{ route('sub-categories.show', $subcategory->id) }}">
                                        <button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
                                    </a>
                                    <a class="px-1" href="{{ route('sub-categories.edit', $subcategory->id) }}">
                                        <button class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                                    </a>
                                    <div>
                                        {!! Form::open(['route'=>['sub-categories.destroy',$subcategory->id], 'method'=>'delete', 'id'=>'category_delete_form_'.$subcategory->id]) !!}
                                        {!! Form::button('<i class="fa-solid fa-trash"></i>',['type'=>'button', 'data-id'=>$subcategory->id, 'id'=> 'category_delete_button_'.$subcategory->id, 'class'=>'btn btn-sm btn-danger category-delete-button']) !!}
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
            $('.category-delete-button').on('click', function(){
                let id= $(this).attr('data-id')

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#category_delete_form_'+id).submit()  //form submit for js
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
