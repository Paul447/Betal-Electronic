@php
    $viewcategorydata = DB::table('categories')
        ->where('is_visible', '=', 1)
        ->get();
@endphp
<h2 class="feture mx-auto featured brand mt-5 mb-5">Featured Category</h2>


<swiper-container class=" mx-auto pt-3 pb-3" space-between="120" id="mySwiper" autoplay-delay="2500"
    autoplay-disable-on-interaction="false" n>

    @foreach ($viewcategorydata as $catdata)
        <swiper-slide class="">
            <a href="{{ url('/categorySearch/' . $catdata->categorys_id) }}">

                <li class="">
                    <img src="{{ asset('/storage/categorythumbnail/' . $catdata->categorythumbnail) }}" alt="">
                </li>
                <p> {{ $catdata->category_name }}</p>
            </a>
        </swiper-slide>
    @endforeach
</swiper-container>

<script>
    const swiperContainer = document.getElementById('mySwiper');
    Object.assign(swiperContainer, {
        slidesPerView: 4,
        spaceBetween: 10,
        pagination: {
            clickable: true,
        },
        breakpoints: {
            240: {
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
