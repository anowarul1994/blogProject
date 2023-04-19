{!! Form::label('category_id', 'Select Category', ['class'=>'mt-2']) !!}
{!! Form::select('category_id',$categories,null, ['class'=>'form-select form-select-sm', 'placeholder' => 'Please Choose category'] )!!}
@error('category_id')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror

{!! Form::label('name', 'SubCategory Name', ['class'=>'mt-2']) !!}
{!! Form::text('name', null,['id'=>'name','class'=>'form-control form-control-sm', 'placeholder'=>'Enter SubCategory Name'] )!!}
@error('name')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror
{!! Form::label('slug', 'SubCategory Slug', ['class'=>'mt-2']) !!}
{!! Form::text('slug', null,['id'=>'slug','class'=>'form-control form-control-sm', 'placeholder'=>'Enter SubCategory Slug'] )!!}
@error('slug')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror
{!! Form::label('status', 'SubCategory Status', ['class'=>'mt-2']) !!}
{!! Form::select('status',[1=>'Published', 0=>'Unpublished'],null, ['class'=>'form-select form-select-sm', 'placeholder' => 'Please Choose Status'] )!!}
@error('status')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror

{!! Form::label('order_by', 'Order By', ['class'=>'mt-2']) !!}
{!! Form::number('order_by', null,['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Category Order By'] )!!}
@error('order_by')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror


@push('script')
    <script>
        $('#name').on('input', function (){
            let value =  $(this).val()
            value = value.replaceAll(' ','-').toLowerCase()
            $('#slug').val(value)

        })
    </script>
@endpush
