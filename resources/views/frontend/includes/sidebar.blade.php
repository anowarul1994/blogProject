<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body category">
            <ul>
                @foreach ($categories as $category)
                
                    <li class="category-item"><a href="{{ $category->subCategories->count()>0 ? 'javascript:void(0)': '/'}}">{{ $category->name }}
                        @if ($category->subCategories->count()>0)
                        <i class="fa-solid fa-plus"></i>
                        @endif
                    </a> 
                        @if ($category->subCategories)
                            <ul style="display:none;">
                                @foreach ($category->subCategories as $subCategory )
                                    <li class="subcategory"><a href="#">{{ $subCategory->name }}</a></li>
                                @endforeach
                                
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>   
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>
</div>

@push('js')
<script>
    $('.category-item').on('click', function(){
        $(this).children('ul').slideDown()
        $(this).children('a').children('i').removeClass('fa-plus').addClass('fa-minus')
        $(this).siblings('.category-item').children('ul').slideUp()
        $(this).siblings('.category-item').children('a').children('i').removeClass('fa-minus').addClass('fa-plus')
    })
</script>
    
@endpush