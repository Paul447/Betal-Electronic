@php
    $cato = DB::table('categories')
        ->where('parent', 0)
        ->where('status', '=', 'approved')
        ->get();
@endphp

<h2 class=" my-5 feture mx-auto">Categories</h2>
<div class="container categorycontainer">
    @foreach ($cato as $x)
        <div class="card-categories-li hp-mod-card-hover align-left" style="background-color:#eee">
            <a class="card-categories-li-content" href="{{ "/viewCategories/$x->categorys_id" }}" >
                @php
                    $image = DB::table('products')
                        ->select('thumbnail')
                        ->where('product_name', 'like', '%' . $x->category_name . '%')
                        ->limit(1)
                        ->get();
                @endphp
                @foreach ($image as $img)
                    <div class="card-categories-image-container">
                        <img class="image" src="{{ asset('/storage/thumbnails/' . $img->thumbnail) }}" alt="{{ $x->category_name }}" loading="lazy">
                    </div>
                @endforeach
                <div class="card-categories-name">
                    <span class="text text-dark">
                        {{ $x->category_name }}
                    </span>
                </div>
            </a>
        </div>
    @endforeach
</div>
