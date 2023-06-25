@php
    $viewBrand = DB::table('brands')->get();
@endphp

<h2 class="feture mx-auto featured brand mt-5 mb-5 ">Featured Brand</h2>
<hr class="mx-5">
<swiper-container class="mySwiper container mx-auto" slides-per-view="3" space-between="120" 
     autoplay-delay="2500" autoplay-disable-on-interaction="false" navigation="true">

    @foreach ($viewBrand as $branddata)
        <swiper-slide class="">
            <a href="{{ url('/fetchbyBrand/' . $branddata->brands_id) }}">
             
                <li class="splide__slide">
                    <img src="{{ asset('/storage/brands/' . $branddata->brand_image) }}" alt="">
                </li>
            </a>
        </swiper-slide>
    @endforeach
    <div class="autoplay-progress" slot="container-end">
        <svg viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="20"></circle>
        </svg>
        <span></span>
    </div>
</swiper-container>
<hr class="mx-5 mb-0">
<script>
    const progressCircle = document.querySelector(".autoplay-progress svg");
    const progressContent = document.querySelector(".autoplay-progress span");

    const swiperEl = document.querySelector("swiper-container");
    swiperEl.addEventListener("autoplaytimeleft", (e) => {
        const [swiper, time, progress] = e.detail;
        progressCircle.style.setProperty("--progress", 1 - progress);
        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
    });

</script>
