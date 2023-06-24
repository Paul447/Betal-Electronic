{{-- {{-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> --}}
@php
    $viewcategorydata = DB::table('categories')
        ->where('is_visible', '=', 1)
        ->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

    <style>
     

        swiper-container {
            width: 50%;
            height: 50%;
        }

        swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        swiper-slide img {
            display: block;
            width: 90px;
            height: 120px;
            object-fit: contain;
        }

        swiper-container {
            width: 100%;
            height: 150px;
            
        }
     
        swiper-pagination {
            display: none;
        }

        .append-buttons {
            text-align: center;
            margin-top: 20px;
        }

        .append-buttons button {
            display: inline-block;
            cursor: pointer;
            border: 1px solid #007aff;
            color: #007aff;
            text-decoration: none;
            padding: 4px 10px;
            border-radius: 4px;
            margin: 0 10px;
            font-size: 13px;
        }
    </style>
</head>

<body>
   
    <h2 class="feture mx-auto featured brand mt-5 mb-5">Featured Brand</h2>
    <hr class="mx-5">
    <swiper-container class="mySwiper container" slides-per-view="3" centered-slides="true" space-between="120" pagination="true"
        pagination-type="fraction" navigation="true">

        @foreach ($viewcategorydata as $catdata)
            <swiper-slide class="">
               <a href=""><li class="splide__slide">
                    <img
                        src="{{ asset('/storage/categorythumbnail/' . $catdata->categorythumbnail) }}" alt="">
                  
                </li>
            </a> 
            </swiper-slide>
  
        @endforeach

    </swiper-container>
    <hr class="mx-5 mb-0">

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <script>
        const swiperEl = document.querySelector('swiper-container');
        const swiper = swiperEl.swiper;
        var appendNumber = 4;
        var prependNumber = 1;
        document
            .querySelector(".prepend-2-slides")
            .addEventListener("click", function(e) {
                e.preventDefault();
                swiper.prependSlide([
                    '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>",
                    '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>",
                ]);
            });
        document
            .querySelector(".prepend-slide")
            .addEventListener("click", function(e) {
                e.preventDefault();
                swiper.prependSlide(
                    '<swiper-slide>Slide ' + --prependNumber + "</swiper-slide>"
                );
            });
        document
            .querySelector(".append-slide")
            .addEventListener("click", function(e) {
                e.preventDefault();
                swiper.appendSlide(
                    '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>"
                );
            });
        document
            .querySelector(".append-2-slides")
            .addEventListener("click", function(e) {
                e.preventDefault();
                swiper.appendSlide([
                    '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>",
                    '<swiper-slide>Slide ' + ++appendNumber + "</swiper-slide>",
                ]);
            });
    </script>
</body>
</html>

