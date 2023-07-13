@php
    $viewBrand = DB::table('brands')->get();
@endphp

<h2 class="feture mx-auto featured brand mt-5 mb-5 ">Featured Brand</h2>

<swiper-container class="mySwiper " space-between="120" autoplay-delay="2500"
    autoplay-disable-on-interaction="false">

    @foreach ($viewBrand as $branddata)
        <swiper-slide class="">
            <a href="{{ url('/fetchbyBrand/' . $branddata->brands_id) }}">

                <li class="">
                    <img src="{{ asset('/storage/brands/' . $branddata->brand_image) }}" alt="">
                </li>
            </a>
        </swiper-slide>
    @endforeach
</swiper-container>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<script>
    const swiperEl = document.querySelector('swiper-container')
    Object.assign(swiperEl, {
        slidesPerView: 4,
        spaceBetween: 10,
        pagination: {
            clickable: true,
        },
        breakpoints: {
            240:{
                slidesPerView: 2,
                spaceBetween: 10,
            },
            450: {
                slidesPerView: 2,
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

</script>
