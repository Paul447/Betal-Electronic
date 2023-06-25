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
            height: 210px;
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
            height: 200px;
            filter: grayscale(1);
            pointer-events: none;
            object-fit: contain;
        }

        swiper-slide:hover img {
            filter: grayscale(0);
        }

        .autoplay-progress {
            position: absolute;
            right: 16px;
            bottom: 6px;
            z-index: 10;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--swiper-theme-color);
        }

        .autoplay-progress svg {
            --progress: 0;
            position: absolute;
            left: 0;
            top: 3px;
            z-index: 10;
            width: 100%;
            height: 100%;
            stroke-width: 4px;
            stroke: var(--swiper-theme-color);
            fill: none;
            stroke-dashoffset: calc(125.6 * (1 - var(--progress)));
            stroke-dasharray: 125.6;
            transform: rotate(-90deg);
        }
    </style>
</head>

<body>

    <h2 class="feture mx-auto featured brand mt-5 mb-5">Featured Category</h2>
    <hr class="mx-5">
    <swiper-container class="mySwiper container mx-auto" slides-per-view="3" space-between="120" pagination="true"
    pagination-type="fraction" autoplay-delay="2500" autoplay-disable-on-interaction="false" navigation="true">

        @foreach ($viewcategorydata as $catdata)
            <swiper-slide class="">
                <a href="{{ url('/categorySearch/' . $catdata->categorys_id) }}">
                    <li class="splide__slide">
                        <img src="{{ asset('/storage/categorythumbnail/' . $catdata->categorythumbnail) }}"
                            alt="">
                    </li>
                    <span>Hello</span>
                </a>
            </swiper-slide>
        @endforeach

    </swiper-container>
    <hr class="mx-5 mb-0">

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}

    <script>
        const swiperEl = document.querySelector('swiper-container');
        const swiper = swiperEl.swiper;
        var appendNumber = 4;
        var prependNumber = 1;
        document.querySelector(".prepend-2-slides")
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
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");

        const swiperEl = document.querySelector("swiper-container");
        swiperEl.addEventListener("autoplaytimeleft", (e) => {
            const [swiper, time, progress] = e.detail;
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        });
    </script>
</body>

</html>
