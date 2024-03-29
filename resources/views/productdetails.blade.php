@foreach ($data as $product)
@endforeach
<script>
    var message = '{{ $product->product_name }}';
    document.title = "Betal International | " + message
</script>
@php
    $metadescription = $metadescriptiondetail;
    $metakeyword = $metaprokeyword;
    $ogimage = $thumb;
    $ogtitle = $ogproducttitle;
    $appname = $ogproducttitle;
@endphp

@include('welcome')
<div class="toast">Please Login First To Add To Cart!</div>
<div class="merobody">
    <div class="slider-container">
        <div class="slider">
            @foreach ($data as $product)
            @endforeach
            @php
                $image = DB::table('productimages')
                    ->where('product_id', $product->product_id)
                    ->first();
                $images = explode('|', $image->image);
            @endphp
            @foreach ($images as $item)
                <div class="slide">
                    <img src="{{ asset('/storage/product/' . $item) }}" alt="{{ $product->product_name }}" loading="lazy">
                </div>
            @endforeach
        </div>
        <div class="slider-controls">
            <div class="control-button prev-button">&#8249;</div>
            <div class="thumbnail-container">
                @foreach ($images as $item)
                    <div class="thumbnail"><img src="{{ asset('/storage/product/' . $item) }}"
                            alt="{{ $product->product_name }}" loading="lazy"></div>
                @endforeach
            </div>
            <div class="control-button next-button">&#8250;</div>
        </div>
    </div>

    <div class="info-container">
        <p class="category-info">{{ $product->brand_name }}</p>
        <h2 class="productname-info"> {{ $product->product_name }}</h2>
        <p class="paisa-info"> @php
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
        <hr>
        <h3 class="discriptio-info"> Description</h3>
        <p class="description-content">{{ $product->discription }}</p>

        <div class="spinnerrr">
            <button class="decreament" id="minus-btn">-</button>
            <input type="number" name="quantity" id="quantity" class="quantity-info" value="1">
            <button class="increament" id="plus-btn">+</button>
        </div>
        @if (!is_null(session('customer')))
            <button a id="" class="add-to-cart" id="addToCartFromCard" value="{{ $product->product_id }}"
                onclick="fetccchCart(this.value);">Add To Cart</button>
        @else
            <button class="show-toast add-to-cart">Add To Cart</button>
        @endif
        @if (!is_null(session('customer')))
            <button class="view-details buy desc-btn mt-3" value="{{ $product->product_id }}"
                onclick="fetchpDetail(this.value);">Buy Now</button>
        @else
            <button class="show-toast add-to-cart">Buy Now</button>
        @endif
    </div>
</div>



<h2 class="feture mx-auto">Product Specification</h2>
<div class="container d-flex justify-content-center align-content-center mt-5  mb-5">
    <div class="table-responsive w-100">
        <table class="table table-striped table-fixed">
            <thead>
                <tr>
                    <th scope="col" class="fixed-column">Attribute</th>
                    <th scope="col" class="fixed-column">Attribute Data</th>

                </tr>
            </thead>
            <tbody>
                @php
                    foreach ($productData as $data) {
                        $variationName = $data->variation_name;
                        $optionName = $data->option_name;
                    
                        if (!isset($variations[$variationName])) {
                            $variations[$variationName] = [];
                        }
                    
                        $variations[$variationName][] = $optionName;
                    }
                @endphp
                @if (!isset($variations))
                @else
                    @foreach ($variations as $variationName => $optionNames)
                        <tr>
                            <td>
                                {{ $variationName }}
                            </td>
                            <td>
                                {{ implode(', ', $optionNames) }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<section id="product1" class="section-p1 ">
    <h2 class="feture mx-auto">Relatable Product</h2>
    <p class="mx-auto" style="width:fit-content;">Check This Out?</p>
    <div class="products-container d-flex justify-content-center -" style="text-align: center;">
        @foreach ($getProductDetail as $product)
            <div class="product-card ">
                <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}">
                    <div class="product-image">
                        <img src="{{ asset('/storage/thumbnails/' . $product->thumbnail) }}" class="imgs"
                            id="CardImage" alt="{{ $product->product_name }}" loading="lazy" />
                    </div>
                </a>

                <div class="product-info pt-2">
                    <span>{{ $product->brand_name }}
                        {{ $value = session()->get('succes') }}
                    </span>
                    <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}">
                        <h4 class="product-name">{{ $product->product_name }}</h4>
                    </a>
                    <p class="product-price  fw-bold text-dark">



                        @php
                            
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
                                onclick="fetcchCart(this.value);"><i class="fas fa-cart-plus"></i></button>
                        @else
                            <button id="" class="show-toast add-to-cart p-2"><i class="fas fa-cart-plus"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<script>
    $(document).ready(function() {

        $("#plus-btn").click(function() {
            var value = parseInt($("#quantity").val());
            if (value < 100) {
                value = value + 1;
                $("#quantity").val(value);
            }
        });


        $("#minus-btn").click(function() {
            var value = parseInt($("#quantity").val());
            if (value > 1) {
                value = value - 1;
                $("#quantity").val(value);
            }
        });
    });
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const thumbnails = document.querySelectorAll('.thumbnail');
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    let currentSlide = 0;

    function showSlide(index) {
        slider.style.transform = `translateX(-${index * 100}%)`;
        thumbnails.forEach((thumbnail, i) => {
            thumbnail.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentSlide++;
        if (currentSlide === slides.length) {
            currentSlide = 0;
        }
        showSlide(currentSlide);
    }

    function previousSlide() {
        currentSlide--;
        if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        }
        showSlide(currentSlide);
    }

    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    prevButton.addEventListener('click', previousSlide);
    nextButton.addEventListener('click', nextSlide);

    setInterval(nextSlide, 5000);

    function fetchData(pdetailValue) {
        var controller = "/CartViewww/";
        var x = document.getElementById("itemValue").value;
        const data = [];
        data[0] = x;
        data[1] = pdetailValue;
        var url = location.origin + controller + data;

        fetch(url, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },


        })
    }


    function fetchpDetail(detailValue) {
        console.log("buying product", detailValue);
        var controll = "/buy/";
        var x = document.getElementById("quantity").value;
        const dataa = [];
        dataa[0] = x;
        dataa[1] = detailValue;
        var urll = location.origin + controll + dataa;
        window.location.href = urll;
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
@include('footermain')
</body>
