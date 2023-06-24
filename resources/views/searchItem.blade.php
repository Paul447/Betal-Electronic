@include('welcome')
@include('slider')


<div class="toast">Please Login First To Add To Cart!</div>

<section id="product1" class="section-p1">
    <h2 class="my-5 feture mx-auto">Searched Result</h2>
    <div class="products-container d-flex justify-content-center">

        @foreach ($data as $product)
            <div class="product-card">
                <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}"
                    style="text-decoration: none;">
                    <div class="product-image">
                        <img src="{{ asset('/storage/thumbnails/' . $product->thumbnail) }}" class="imgs"
                            alt="{{ $product->product_name }}" id="CardImage" />
                    </div>
                </a>


                <span class="brandname">{{ $product->brand_name }}
                </span>
                <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}"
                    style="text-decoration: none;">
                    <h4 class="product-name">{{ $product->product_name }}</h4>
                </a>
                <p class="product-price">

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
                <div class="product-buttons ">
                    <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}"
                        class="view-details" style="text-decoration: none; text-align:center;"><i
                            class="fas fa-info-circle"></i></a>
                    @if (!is_null(session('customer')))
                        <button class="add-to-cart" id="addToCartFromCard" value="{{ $product->product_id }}"
                            onclick="fetcchCart(this.value);"><i class="fas fa-cart-plus"></i></button>
                    @else
                        <button id="" class="show-toast add-to-cart"><i class="fas fa-cart-plus"></i></a>
                    @endif
                </div>

            </div>
        @endforeach
    </div>

    @if (session('cart'))
        <script>
            Toast.fire({
                icon: 'success',
                title: '{{ session('cart') }}'
            })
        </script>
        @php
            session()->forget('cart');
        @endphp
    @endif
    @if (session('QtyUpdated'))
        <script>
            Toast.fire({
                icon: 'success',
                title: '{{ session('QtyUpdated') }}'
            })
        </script>
        @php
            session()->forget('QtyUpdated');
        @endphp
    @endif
</section>

@include('footermain')
<script>
    function fetcchCart(cartvalue) {
        var controller = "/CartVieww/";
        var host = location.origin + controller;
        var url = location.origin + controller + cartvalue;
        fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                },
            })
            .then(response => response.json())
            .then(response => {
                let html = response.status;
                Toast.fire({
                    icon: 'success',
                    title: html,
                })
                Toast.fire({
                    icon: 'success',
                    title: html,
                })
            })
    }
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
