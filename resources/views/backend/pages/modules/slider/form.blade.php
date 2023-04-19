

{!! Form::label('title', 'Slider title', ['class'=>'mt-2']) !!}
{!! Form::text('title', null,['id'=>'title','class'=>'form-control form-control-sm', 'placeholder'=>'Enter slider title'] )!!}
@error('title')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror

{!! Form::label('content', 'Slider Content', ['class'=>'mt-2']) !!}
{!! Form::text('content', null,['id'=>'content','class'=>'form-control form-control-sm', 'placeholder'=>'Enter Slider Content'] )!!}
@error('content')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror

{!! Form::label('status', 'Slider Status', ['class'=>'mt-2']) !!}
{!! Form::select('status',[1=>'Active', 0=>'Unactive'],null, ['class'=>'form-select form-control-sm', 'placeholder' => 'Please Choose Status'] )!!}
@error('status')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror

{!! Form::label('order_by', 'Order By', ['class'=>'mt-2']) !!}
{!! Form::number('order_by', null,['class'=>'form-control form-control-sm', 'placeholder'=>'Enter Slider Order By'] )!!}
@error('order_by')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror

{!! Form::label('photo', 'Slider Photo', ['class'=>'mt-2']) !!}
{!! Form::file ('photo', ['class'=>'form-control form-control-sm'] )!!}
@error('photo')
<p class="text-danger mb-0"><small><i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}</small></p>
@enderror



