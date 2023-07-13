<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<div id="demo" class="carousel  mx-auto justify-content-center main" data-bs-ride="carousel">

    @php
        $banners = DB::table('banners')->get();
        $indicitor_count = 0;
    @endphp
    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        @foreach ($banners as $banner)
            @if ($indicitor_count == 0)
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $indicitor_count }}"
                    class="active"></button>
            @else
                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $indicitor_count }}"></button>
            @endif
            @php $indicitor_count++; @endphp
        @endforeach
    </div>

    <!-- The slideshow/carousel -->
    <div class="row">
        <div class="carousel-inner">
            @php
                $banner_count = 0;
            @endphp
            @foreach ($banners as $banner)
                @if ($banner_count == 0)
                    <div class="carousel-item active animate__animated animate__bounceInDown ">
                        <img class="slide" src="{{ asset('storage/banner/' . $banner->banner_img) }}"
                            alt="{{ $banner->image_alt_text }}" />
                    </div>
                @else
                    <div class="carousel-item animate__animated animate__bounceInDown">
                        <img class="slide" src="{{ asset('storage/banner/' . $banner->banner_img) }}"
                            alt="{{ $banner->image_alt_text }}" />
                    </div>
                @endif
                @php $banner_count++; @endphp
            @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>
