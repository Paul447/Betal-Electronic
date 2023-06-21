

    @php
    $viewcategorydata =  DB::table('categories')
        ->where('is_visible', '=', 1)
        ->get();
@endphp
    <h2 class="my-5 feture mx-auto">Category</h2>
    <div class="brand-slider owl-carousel container">
        @foreach ($viewcategorydata as $catdata)
        
        <div class="slider-container">
            <img src="{{ asset('/storage/categorythumbnail/' . $catdata->categorythumbnail)}}" alt="{{$catdata->category_name}}">
        </div>
        <p>{{$catdata->category_name}}</p>
        @endforeach
    </div>

    
 
