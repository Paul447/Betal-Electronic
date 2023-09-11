@include('welcome')
@include('slider')
@include('brandchoice')

@include('categories')


<div class="toast">Please Login First To Add To Cart!</div>
<section id="product1" class="section-p1 text-align-center">
    <h2 class="my-5 feture mx-auto">Featured Products</h2>

    @if (!is_null($featured))
        <div class="products-container d-flex justify-content-center text-center">

            @foreach ($featured as $featured)
                <div class="product-card">
                    <a href="{{ '/productdetails/' . $featured->product_id . '/' . $featured->slug }}">
                        <div class="product-image">
                            <img src="{{ asset('/storage/thumbnails/' . $featured->thumbnail) }}" class="imgs"
                                id="CardImage" alt="{{ $featured->product_name }}" loading="lazy" />
                        </div>
                    </a>

                    <div class="product-info  pt-2">
                        <span>{{ $featured->brand_name }}
                        </span>
                        <a href="{{ '/productdetails/' . $featured->product_id . '/' . $featured->slug }}"
                            style="text-decoration: none;">
                            <h4 class="product-name">{{ $featured->product_name }}</h4>
                        </a>
                        <p class="product-price fw-bold text-dark">
                            @php
                                $price = DB::table('add_product_batches')
                                    ->where('product', $featured->product_id)
                                    ->first();
                                $xy = $price->availablequantity;
                                
                                $hello = DB::table('add_product_batches')
                                    ->where('product', $featured->product_id)
                                    ->whereNotNull('availablequantity')
                                    ->where('availablequantity', '<>', 0)
                                    ->orderBy('batchid', 'asc')
                                    ->limit(1)
                                    ->pluck('sellingprice')
                                    ->first();
                                $val = 'Out Of Stock';
                                
                            @endphp
                            @if (is_null($hello))
                                {{ $val }}
                            @else
                                Rs.{{ $hello }}
                            @endif
                        </p>
                        <div class="product-buttons pt-4 pb-1">
                            <a href="{{ '/productdetails/' . $featured->product_id . '/' . $featured->slug }}"
                                class="view-details p-1" style="text-decoration: none;"><i
                                    class="fas fa-info-circle"></i></a>

                            @if (!is_null(session('customer')))
                                <button class="add-to-cart p-1" id="addToCartFromCard" value="{{ $featured->product_id }}"
                                    onclick="fetcchCart(this.value);"><i class="fas fa-cart-plus"></i></button>
                            @else
                                <button id="" class="show-toast add-to-cart p-1"><i
                                        class="fas fa-cart-plus"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
<script>
    document.title = "Betal International | Home"
</script>
@include('newarrivaltoui')

@include('categorychoice')
@include('footermain')
