{!! Form::label('name', 'Post Title') !!}
{!! Form::text('name', null,['id'=>'name','class'=>'form-control form-control-sm', 'placeholder'=>'Enter Category Name'] )!!}
@error('name')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror
{!! Form::label('slug', 'Post Slug', ['class'=>'mt-2']) !!}
{!! Form::text('slug', null,['id'=>'slug','class'=>'form-control form-control-sm', 'placeholder'=>'Enter Category Slug'] )!!}
@error('slug')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror
{!! Form::label('status', 'Category Status', ['class'=>'mt-2']) !!}
{!! Form::select('status',[1=>'Published', 0=>'Unpublished'],null, ['class'=>'form-select form-select-sm', 'placeholder' => 'Please Choose Status'] )!!}
@error('status')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror
<div class="row">
    <div class="col-md-6">
        {!! Form::label('category_id', 'Select Category', ['class'=>'mt-2']) !!}
        {!! Form::select('category_id',$categories,null, ['id'=>'category_select','class'=>'form-select form-select-sm', 'placeholder' => 'Please Choose category'] )!!}
        @error('category_id')
        <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
        @enderror
    </div>
    <div class="col-md-6">
        {!! Form::label('subCategory_id', 'Select Sub Category', ['class'=>'mt-2']) !!}
        <select id="sub_categories_select" class="form-select form-select-sm">
            <option SELECTED> Select Sub Category</option>
        </select>

        @error('subCategory_id')
        <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
        @enderror
    </div>
</div>


@push('script')
    <script>
        $('#name').on('input', function (){
            let value =  $(this).val()
            value = value.replaceAll(' ','-').toLowerCase()
            $('#slug').val(value)

        })

        $('#category_select').on('change', function (){
            let id = $(this).val()
            axios.get(window.location.origin+'/dashboard/get-sub-categories/'+id).then(res=>{
                let subCategories = res.data.data

                $('#sub_categories_select').empty()
                $('#sub_categories_select').append(`<option selected >Select Sub Category</option>`)
                subCategories.map((subCategory, index)=>(
                    $('#sub_categories_select').append(`<option value="${subCategory.id}">${subCategory.name}</option>`)
                ))

            })

        })

    </script>
@endpush
