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
        {!! Form::label('sub_category_id', 'Select Sub Category', ['class'=>'mt-2']) !!}
        <select id="sub_categories_select" name="sub_category_id" class="form-select form-select-sm">
            <option SELECTED> Select Sub Category</option>
        </select>

        @error('sub_category_id')
        <p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
        @enderror
    </div>
</div>

{!! Form::label('description', 'Post Description', ['class'=>'mt-2']) !!}
{!! Form::textarea('description',null, ['id'=>'description','class'=>'form-control form-control-sm', 'placeholder' => 'Enter your post description'] )!!}
@error('description')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror
{!! Form::label('photo', 'Post Photo', ['class'=>'mt-2']) !!}
{!! Form::file('photo',['class'=>'form-control form-control-sm'] )!!}
@error('photo')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror








