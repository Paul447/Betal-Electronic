@foreach ($catoName as $catname)
    <script>
        var message = '{{ $catname->category_name }}';
        document.title = "Betal International | " + message
    </script>

    @php
        $metadescription = $catname->meta_desc;
        $metakeyword = $catname->category_name;
        $ogtitle = $catname->category_name;
        $appname = $catname->category_name;
        $ogimage = $ogcategortythumb;
    @endphp
@endforeach


@include('welcome')
@include('slider')


<div class="toast">Please Login First To Add To Cart!</div>


<section id="product1" class="section-p1">
    @foreach ($catoName as $catname)
        <h2 class="mx-auto my-5 feture" id="hello">{{ $catname->category_name }}</h2>
    @endforeach
    <div class="products-container d-flex justify-content-center " style="  text-align: center;">

        @foreach ($data as $product)
            <div class="product-card">
                <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}">
                    <div class="product-image">
                        <img src="{{ asset('/storage/thumbnails/' . $product->thumbnail) }}" class="imgs"
                            alt="{{ $product->product_name }}" id="CardImage" />
                    </div>
                </a>

                <div class="product-info text-align-center pt-2">
                    <span class="text-align-center">{{ $product->brand_name }}
                    </span>
                    <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}">
                        <h4 class="product-name">{{ $product->product_name }}</h4>
                    </a>


                    <p class="product-price fw-bold text-dark">

                        @php
                            $price = DB::table('add_product_batches')
                                ->where('product', $product->product_id)
                                ->first();
                            $xy = $price->availablequantity;
                            
                            $hello = DB::table('add_product_batches')
                                ->where('product', $product->product_id)
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
                        <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}"
                            class="view-details p-2" style="text-decoration: none;"><i class="fas fa-info-circle"></i></a>
                        @if (!is_null(session('customer')))
                            <button class="add-to-cart p-2" id="addToCartFromCard" value="{{ $product->product_id }}"
                                onclick="fetcchCart(this.value);">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        @else
                            <button id="" class="show-toast add-to-cart p-2"><i class="fas fa-cart-plus"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@include('footermain')
