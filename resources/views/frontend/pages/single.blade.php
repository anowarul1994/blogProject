@extends('frontend.layout.master')

@section('page_title', 'Welcome')

@section('content')
@if ($single_post)
    

<div class="card mb-4">
    <a href="#!"><img class="card-img-top" src="{{ asset('image/uploads/original/'.$single_post->photo) }}" alt="..." /></a>
    <div class="card-body">
        <div class="small text-muted mb-2 post-item">
            <span><i class="text-primary fa-solid fa-clock"></i> {{ $single_post->created_at->toDayDateTimeString() }}</span>
            <span><i class="text-primary fa-solid fa-user"></i> {{ $single_post->user?->name }} </span>
            <span><i class="text-primary fa-solid fa-list"></i></i> {{ $single_post->category?->name }} <i class="fa-solid fa-arrow-right"></i> {{ $single_post->subCategory?->name }} </span>
        </div>
        <h2 class="card-title">{{ $single_post->name }}</h2>
        <p class="card-text">{!! $single_post->description  !!} </p>
        
    </div>
</div>
@else
<p class="text-danger text-center">No Blog Found</p>
@endif

<div class="card mb-5">
    <div class="card-header">
        <h4 class="mb-0">Comments</h4>
    </div>
    <div class="card-body">
        @foreach ( $single_post->comment as $comment )
            
        
        <div class="d-flex mb-5">
            <div class="flex-shrink-0">
              <img src="{{ asset('image/profile.webp') }}" width="75px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="mb-0"><strong>{{ $comment->user->name }}</strong></p>
                <p class="mb-1"><small>{{ $comment->created_at->toDayDateTimeString() }}</small></p>
                <p>{{ $comment->comment }}</p>

                @foreach ($comment->replay as $replay)
                            
                <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="{{ asset('image/profile.webp') }}" width="75px" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="mb-0"><strong>{{ $replay->user->name }}</strong></p>
                        <p class="mb-1"><small>{{ $replay->created_at->toDayDateTimeString() }}</small></p>
                        <p>{{ $replay->comment }}</p>
                        
                    </div>
                </div>
                @endforeach

                @auth()
                    
               
                {!! Form::open(['route'=>'comment.store', 'method'=>'post']) !!}
                {!! Form::hidden('post_id', $single_post->id ) !!}
                {!! Form::hidden('comment_id', $comment->id ) !!}
                    <div class="input-group">
                        {!! Form::text('comment', null, ['class'=>'form-control form-control-sm', 'placeholder'=> 'Replay']) !!}
                        {!! Form::button('Replay', ['class'=>'btn btn-sm btn-success input-group-text', 'type'=> 'submit']) !!}
                    </div>
                {!! Form::close() !!}
                @endauth
            </div>
        </div>
        @endforeach
          <div class="comment-area mt-4">
            @auth
                
           
                {!! Form::open(['route'=>'comment.store', 'method'=>'post']) !!}
                {!! Form::hidden('post_id', $single_post->id ) !!}
                    <div class="input-group">
                        {!! Form::text('comment', null, ['class'=>'form-control form-control-sm', 'placeholder'=> 'Write your comment']) !!}
                        {!! Form::button('Comment', ['class'=>'btn btn-sm btn-success input-group-text', 'type'=> 'submit']) !!}
                    </div>
                {!! Form::close() !!}
                @endauth

          </div>
    </div>
    
</div>


<hr>

@endsection