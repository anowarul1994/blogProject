@extends('backend.layout.master')

@section('page_title', 'Post List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-0">Post List</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('posts.create') }}"><button class="btn btn-sm btn-success"><i class="fa-solid fa-plus"></i> Add New </button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="width: 80vw; font-size: 14px">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Photo</th>
                                <th class="text-center ">Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($trashed_posts as $trashed_post)
                            <tr>
                                <td class="align-middle text-justify pb-1">{{ $loop->index+1 }}</td>
                                <td class="align-middle pb-1">{{ $trashed_post->name }}</td>
                                <td class="align-middle pb-1">
                                    <p class="m-0" >{{ $trashed_post->category->name }}</p>
                                    <p class="m-0 text-success" >{{ $trashed_post->subCategory->name }}</p>
                                </td>

                                <td class="align-middle text-center pb-1">
                                    @if($trashed_post->status == 1)
                                        <span class="badge bg-primary">Published</span>
                                    @else
                                        <span class=" mb-0 badge text-danger bg-warning">Unpublished</span>
                                    @endif

                                </td>
                                <td class="align-middle text-justify pb-1">
                                    <img width="70px" src="{{ asset('image/uploads/thumbnail/'.$trashed_post->photo) }}" alt="">
                                </td>
                                <td class="align-middle text-justify pb-1">{!!    strip_tags(substr($trashed_post->description,0, 250)) !!} ...</td>

                                <td class="align-middle text-center d-flex pb-1" style="padding: 8px 0 0 5px;">

                                    <a href="{{ route('posts.show', $trashed_post->id) }}">
                                        <button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
                                    </a>
                                    <div>
                                        {!! Form::open(['route'=>['posts.destroy',$trashed_post->id], 'method'=>'delete', 'id'=>'post_delete_form_'.$trashed_post->id]) !!}
                                        {!! Form::button('<i class="fa-solid fa-trash"></i>',['type'=>'button', 'data-id'=>$trashed_post->id, 'id'=> 'category_delete_button_'.$trashed_post->id, 'class'=>'btn btn-sm btn-danger post-delete-button']) !!}
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
            $('.post-delete-button').on('click', function(){
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
                    $('#post_delete_form_'+id).submit()  //form submit for js
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
