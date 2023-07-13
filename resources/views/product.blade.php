<script>
    document.title = "Betal International | Home"
</script>
<meta name="description" content="Power up your world with Betal International - Your one-stop computer shop!">
<meta name="keywords"
    content="Laptop accessories Kathmandu,Gaming accessories Nepal,Computer peripherals Kathmandu,Printers and scanners Nepal,Best deals on computer accessories Kathmandu,Keyboard and mouse Kathmandu">
<meta name="title" content="Best Computer Store - Buy Laptops, PC Components in Nepal">
<meta property="og:title" content="Best Computer Store - Buy Laptops, PC Components in Nepal">
<meta property="og:site_name" content="Betal International">
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
                                id="CardImage" alt="{{ $featured->product_name }}" />
                        </div>
                    </a>


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
                    <div class="product-buttons">

                        <a href="{{ '/productdetails/' . $featured->product_id . '/' . $featured->slug }}"
                            class="view-details" style="text-decoration: none;"><i class="fas fa-info-circle"></i></a>

                        @if (!is_null(session('customer')))
                            <button class="add-to-cart" id="addToCartFromCard" value="{{ $featured->product_id }}"
                                onclick="fetcchCart(this.value);"><i class="fas fa-cart-plus"></i></button>
                        @else
                            <button id="" class="show-toast add-to-cart"><i class="fas fa-cart-plus"></i></a>
                        @endif
                    </div>



                </div>
            @endforeach
        </div>
    @endif
</section>

@include('categorychoice')
@include('footermain')


<script>
    const showToastButton = document.querySelectorAll(".show-toast");
    var toast = document.querySelector('.toast');
    showToastButton.forEach((btnToast, i) => {
        btnToast.addEventListener("click", (e) => {
            Toast.fire({
                icon: 'info',
                title: 'Please Login First to Countinue'
            })
        })
    });
</script>
{{-- Logged In successfully message --}}
@if (session('message'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('message') }}'
        })
    </script>
    @php
        session()->forget('message');
    @endphp
@endif

{{-- Registered Successfully message --}}
@if (session('Registered'))
    <script>
        Toast.fire({
            icon: 'success',
            title: '{{ session('Registered') }}'
        })
    </script>
    @php
        session()->forget('Registered');
    @endphp
@endif
