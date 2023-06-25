@php
    $viewcategorydata = DB::table('categories')
        ->where('is_visible', '=', 1)
        ->get();
@endphp




<style>
    swiper-container {
        width: 50%;
        height: 210px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        border: 3px solid #a50318;
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
        height: 100px;
        filter: grayscale(1);
        pointer-events: none;
        object-fit: contain;
    }

    swiper-slide:hover img {
        filter: grayscale(0);
    }
</style>




<h2 class="feture mx-auto featured brand mt-5 mb-5">Featured Category</h2>

<swiper-container class=" container mx-auto pt-3 pb-3" space-between="120" id="mySwiper" autoplay-delay="2500"
    autoplay-disable-on-interaction="false" n>

    @foreach ($viewcategorydata as $catdata)
        <swiper-slide class="">
            <a href="{{ url('/categorySearch/' . $catdata->categorys_id) }}">

                <li class="splide__slide">
                    <img src="{{ asset('/storage/categorythumbnail/' . $catdata->categorythumbnail) }}" alt="">
                </li>
            </a>
        </swiper-slide>
    @endforeach
</swiper-container>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<script>
        const swiperContainer = document.getElementById('mySwiper');
    Object.assign(swiperContainer, {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },
    });
    swiperEl.initialize();
</script>
