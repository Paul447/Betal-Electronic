@php
    $viewBrand = DB::table('brands')->get();
@endphp

<style>
    swiper-container {
        width: 85%;
        height: 210px;
        /* margin: 10px; */
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        max-width: 1320px;
        
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


<h2 class="feture mx-auto featured brand mt-5 mb-5 ">Featured Brand</h2>

<swiper-container class="mySwiper " space-between="120" autoplay-delay="2500"
    autoplay-disable-on-interaction="false">

    @foreach ($viewBrand as $branddata)
        <swiper-slide class="">
            <a href="{{ url('/fetchbyBrand/' . $branddata->brands_id) }}">

                <li class="">
                    <img src="{{ asset('/storage/brands/' . $branddata->brand_image) }}" alt=" {{$branddata->brand_name}}" loading="lazy">
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
