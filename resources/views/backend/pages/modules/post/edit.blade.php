@extends('backend.layout.master')

@section('page_title', 'Edit Category')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit category</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($postEdit,['route'=>['posts.update', $postEdit->id], 'method'=>'put', 'files'=>true]) !!}

                    @include('backend.pages.modules.post.form')
                    <img class="img-thumbnail" width="" src="{{ asset('image/uploads/thumbnail/'.$postEdit->photo) }}" alt=""> </br>
                    {!! Form::button('<i class="fa-solid fa-edit"></i> Update Post',['class'=>'btn btn-sm btn-success mt-3' ,'type'=>'submit'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>

        //subcategory show code start
        let sub_category_id = "<?php echo $postEdit->sub_category_id?>"

        const getSubcategories = (id) =>{
            axios.get(window.location.origin+'/dashboard/get-sub-categories/'+id).then(res=>{
                let subCategories = res.data.data

                $('#sub_categories_select').empty()
                $('#sub_categories_select').append(`<option value="0">Select Sub Category</option>`)
                subCategories.map((subCategory, index)=>(
                    $('#sub_categories_select').append(`<option ${subCategory.id == sub_category_id ?'selected':'' } value="${subCategory.id}">${subCategory.name}</option>`)
                ))

            })
        }

        let category_id = "<?php echo $postEdit->category_id?>"
        getSubcategories(category_id)
        $('#category_select').on('change', function (){
            let id = $(this).val()
            getSubcategories(id);
        })

        //subcategory show code end

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
