<header class=" bg-light border-bottom">

    <div class="home-slider">
        @foreach ($sliders as $slider)
       
        <div>
            <img src="{{ asset('image/uploads/slider/'.$slider->photo) }}" alt="banner">
        </div>
             
        @endforeach
        
    </div>





    {{-- <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Blog Home!</h1>
            <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div> --}}
</header>