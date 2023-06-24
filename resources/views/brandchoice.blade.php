
@php
$viewBrand = DB::table('brands')
    ->get();
@endphp

<h2 class="feture mx-auto featured brand mt-5 mb-5">Featured Brand</h2>
<hr class="mx-5">
<swiper-container class="mySwiper container" slides-per-view="3" centered-slides="true" space-between="120"
    pagination="true" pagination-type="fraction" navigation="true">

    @foreach ($viewBrand as $branddata)
        <swiper-slide class="">
            <a href="{{url('/fetchbyBrand/'.$branddata->brands_id)}}">
                <li class="splide__slide">
                    <img src="{{ asset('/storage/brands/' . $branddata->brand_image) }}"
                        alt="">
                </li>
            </a>
        </swiper-slide>
    @endforeach

</swiper-container>
<hr class="mx-5 mb-0">