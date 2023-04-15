@extends('backend.layout.master')

@section('page_title', 'Create Post')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-0">Create Post </h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('posts.index') }}"><button class="btn  btn-sm btn-outline-dark"><i class="fa-solid fa-list"></i> List </button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'posts.store', 'method'=>'POST', 'files'=>true]) !!}

                    @include('backend.pages.modules.post.form')


                    {!! Form::button('<i class="fa-solid fa-square-plus"></i> Create New Post',['class'=>'btn btn-sm btn-success mt-3' ,'type'=>'submit'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection


@push('script')
    <script>
        // Sub Category show code start

        const getSubcategories = (id) =>{
            axios.get(window.location.origin+'/dashboard/get-sub-categories/'+id).then(res=>{
                let subCategories = res.data.data

                $('#sub_categories_select').empty()
                $('#sub_categories_select').append(`<option selected >Select Sub Category</option>`)
                subCategories.map((subCategory, index)=>(
                    $('#sub_categories_select').append(`<option  value="${subCategory.id}">${subCategory.name}</option>`)
                ))

            })
        }
        $('#category_select').on('change', function (){
            let id = $(this).val()
            getSubcategories(id);
        })
        //subcategory show end

        //slug code start
        $('#name').on('input', function (){
            let value =  $(this).val()
            value = value.replaceAll(' ','-').toLowerCase()
            $('#slug').val(value)
        })
        //slug code end


        //ckeditor
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endpush
