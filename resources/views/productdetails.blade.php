   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mukesh,Subesh,Suresh">
    @foreach ($data as $product)
    @endforeach
    <meta name="description" content="{{ $product->discription }}">
    <meta name="application-name" content="{{ $product->product_name }}">
    <meta name="keywords" content="{{ $product->lowstockindication }},Computer accessories in Kathmandu,Buy computer accessories Kathmandu">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Betal International - Betal International">
    <meta property="og:image" content="{{ asset('/storage/thumbnails/' . $product->thumbnail) }}">
    <meta property="og:site_name" content="Betal International">
    <script>
        var message = '{{ $product->product_name}}';
        document.title = "Betal International | "+message
    </script>
@include('welcome')


  
    <style>
        .category-info {
            padding: 0 !important;
            margin: 0 !important;
        }

        :root {
            --red: #A50318;
            --light-red: #aa4f5b9c;
            --black: #0c0c0c;
            --white: #ffffff;
        }

        hr {
            border-top: 2px solid #a50318 !important;
            opacity: 1 !important;
        }

        .spinnerrr>* {
            padding: 7px 10px;
        }

        .quantity-info {
            width: 60px;
        }

        .description-content {
            margin-bottom: 20px;
        }

        .spinnerrr {
            margin-bottom: 40px;
        }

        .discriptio-info {
            padding: 20px 0 10px;
        }

        .view-details,
        .add-to-cart {
            background-color: #a50318;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            border-radius: 5px;
            font-size: 1.2rem;
            max-width: 200px;

        }

        .view-details:focus,
        .add-to-cart:focus,
        .view-details:hover,
        .add-to-cart:hover {
            background-color: #a50318;
            color: #ffffff;
            outline: 3px solid var(--light-red) !important;
        }

        .merobody {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 120px 20px 80px 20px;
        }

        .paisa-info {
            font-size: 1.2em;
            padding-bottom: 10px;
        }

        .slider-container {
            position: relative;
            width: 40%;
            max-width: 600px;
            height: 350px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
        }

        .info-container {
            width: 50%;
            padding: 20px 20px 30px 20px;
            height: fit-content;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
        }

        .productname-info {
            padding: 10px 0;
            text-transform: uppercase;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slide {
            flex: 0 0 100%;
            overflow: hidden;
            padding-bottom: 5px;
            width: 100%;
            height: 260px;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .slide:hover img {
            transform: scale(1.1);
        }

        .slider-controls {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .thumbnail-container {
            margin-top: 10px;
            text-align: center;
        }

        .thumbnail {
            display: inline-block;
            width: 50px;
            height: 50px;
            margin: 0 5px;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .thumbnail img {
            object-fit: cover;
            height: 50px !important;
            width: 50px !important;
        }

        .thumbnail:hover {
            opacity: 1;
        }

        .thumbnail.active {
            opacity: 1;
            border: 2px solid #000;
        }

        .control-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: #a50318;
            color: #fff;
            font-size: 24px;
            line-height: 40px;
            text-align: center;
            cursor: pointer;
        }

        .prev-button {
            left: 10px;
        }

        .next-button {
            right: 10px;
        }

        @media only screen and (max-width: 850px) {

            .merobody {
                flex-direction: column;
                gap: 20px;
            }

            .slider-container {
                width: 95%;
                margin: auto;
            }

            .info-container {
                width: 95%;
                max-width: 600px;
                margin: auto;
            }

        }

        @media (max-width: 430px) {
            .desc-btn {
                display: block;
                text-align: center;
            }

            .desc-btn.add-to-cart {
                margin-bottom: 20px;
            }
        }

        @media only screen and (max-width: 400px) {
            .slider-container {
                height: auto;
            }

            .slide {
                height: auto;
                padding-bottom: 0;
            }

            .slide img {
                height: auto;
            }

            .thumbnail-container {
                margin-top: 5px;
            }

            .control-button {
                font-size: 18px;
                width: 30px;
                height: 30px;
                line-height: 30px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>

<body>
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
                        <img src="{{ asset('/storage/product/' . $item) }}" alt="{{ $product->product_name }}">
                    </div>
                @endforeach
            </div>
            <div class="slider-controls">
                <div class="control-button prev-button">&#8249;</div>
                <div class="thumbnail-container">
                    @foreach ($images as $item)
                        <div class="thumbnail"><img src="{{ asset('/storage/product/' . $item) }}"
                                alt="{{ $product->product_name }}"></div>
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
            <button class="view-details buy desc-btn mt-3" value="{{ $product->product_id }}"
                onclick="fetchpDetail(this.value);">Buy Now</button>
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
                                id="CardImage" alt="{{ $product->product_name }}" />
                        </div>
                    </a>

                    <div class="product-info">
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
                        <div class="product-buttons">
                            <a href="{{ '/productdetails/' . $product->product_id . '/' . $product->slug }}"
                                class="view-details" style="text-decoration: none;"><i
                                    class="fas fa-info-circle"></i></a>
                            @if (!is_null(session('customer')))
                                <button class="add-to-cart" id="addToCartFromCard" value="{{ $product->product_id }}"
                                    onclick="fetcchCart(this.value);"><i class="fas fa-cart-plus"></i></button>
                            @else
                                <button id="" class="show-toast add-to-cart"><i
                                        class="fas fa-cart-plus"></i></a>
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
