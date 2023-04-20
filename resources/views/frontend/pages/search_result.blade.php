@extends('frontend.layout.master')

@section('page_title', 'Welcome')

@section('content')

<!-- Nested row for non-featured blog posts-->
<div class="row">

    @foreach ($posts as $post)
        
   
    <div class="col-lg-6 mb-4">
        <!-- Blog post-->
        <div class="card h-100 ">
            <a href="#!"><img class="card-img-top" src="{{ asset('image/uploads/original/'.$post->photo) }}" alt="..." /></a>
            <div class="card-body">
                <div class="small text-muted">
                    <span><i class="text-primary fa-solid fa-clock"></i> {{ $post->created_at->toDayDateTimeString() }}</span> <br>
                    <span><i class="text-primary fa-solid fa-user"></i> {{ $post->user?->name }} </span> <br>
                    <span><i class="text-primary fa-solid fa-list"></i></i> {{ $post->category?->name }} <i class="fa-solid fa-arrow-right"></i> {{ $post->subCategory?->name }} </span></div>
                <h2 class="card-title h4">{{ $post->name }}</h2>
                <p class="card-text">{!! strip_tags(substr($post->description,0, 450))   !!} </p>
                <a class="btn btn-primary" href="{{ route('front.single_blog', [$post->slug_id, $post->slug]) }}">Read more →</a>
            </div>
        </div>
    </div>
    @endforeach

</div>

<hr>
<!-- Pagination-->
{{ $posts->links() }}
@endsection