@extends('backend.layout.master')

@section('page_title', 'Post '. $title)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-0">Post {{ $title }}</h4>
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
                        @foreach($posts as $post)
                            <tr>
                                <td class="align-middle text-justify pb-1">{{ $loop->index+1 }}</td>
                                <td class="align-middle pb-1">{{ $post->name }}</td>
                                <td class="align-middle pb-1">
                                    <p class="m-0" >{{ $post->category->name }}</p>
                                    <p class="m-0 text-success" >{{ $post->subCategory->name }}</p>
                                </td>

                                <td class="align-middle text-center pb-1">
                                    @if($post->status == 1)
                                        <span class="badge bg-primary">Published</span>
                                    @else
                                        <span class=" mb-0 badge text-danger bg-warning">Unpublished</span>
                                    @endif

                                </td>
                                <td class="align-middle text-justify pb-1">
                                    <img width="70px" src="{{ asset('image/uploads/thumbnail/'.$post->photo) }}" alt="">
                                </td>
                                <td class="align-middle text-justify pb-1">{!!    strip_tags(substr($post->description,0, 250)) !!} ...</td>

                                <td class="align-middle text-center d-flex pb-1" style="padding: 8px 0 0 5px;">
                                    
                                    @if ($title == "List")
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button>
                                    </a>
                                    <a class="px-1" href="{{ route('posts.edit', $post->id) }}">
                                        <button class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                                    </a>
                                    <div>
                                        {!! Form::open(['route'=>['posts.destroy',$post->id], 'method'=>'delete', 'id'=>'post_delete_form_'.$post->id]) !!}
                                        {!! Form::button('<i class="fa-solid fa-trash"></i>',['type'=>'button', 'data-id'=>$post->id, 'id'=> 'category_delete_button_'.$post->id, 'class'=>'btn btn-sm btn-danger post-delete-button']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    @else
                                        <a class="px-1" href="{{ route('posts.restore', $post->id) }}">
                                            <button class="btn btn-info btn-sm"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                                        </a>
                                        <div>
                                            {!! Form::open(['route'=>['posts.forceDelete',$post->id], 'method'=>'delete', 'id'=>'post_force_delete_form_'.$post->id]) !!}
                                            {!! Form::button('<i class="fa-solid fa-trash"></i>',['type'=>'button', 'data-id'=>$post->id, 'id'=> 'category_delete_button_'.$post->id, 'class'=>'btn btn-sm btn-danger post-force-delete-button']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                    

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
            $('.post-force-delete-button').on('click', function(){
                let id= $(this).attr('data-id')

                Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to parmarent delete it?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#post_force_delete_form_'+id).submit()  //form submit for js
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
