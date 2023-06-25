@php
    $viewBrand = DB::table('brands')->get();
@endphp

<h2 class="feture mx-auto featured brand mt-5 mb-5 ">Featured Brand</h2>

<swiper-container class="mySwiper container mx-auto pt-3 pb-3" space-between="120" autoplay-delay="2500"
    autoplay-disable-on-interaction="false">

    @foreach ($viewBrand as $branddata)
        <swiper-slide class="">
            <a href="{{ url('/fetchbyBrand/' . $branddata->brands_id) }}">

                <li class="splide__slide">
                    <img src="{{ asset('/storage/brands/' . $branddata->brand_image) }}" alt="">
                </li>
            </a>
        </swiper-slide>
    @endforeach
</swiper-container>

<script>
    const swiperEl = document.querySelector('swiper-container')
    Object.assign(swiperEl, {
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
