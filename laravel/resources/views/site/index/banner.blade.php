    <!-- Hero slider -->
    <section class="section-hero next">
        <div class="cr-slider swiper-container">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <div class="cr-hero-banner cr-banner-image-one"
                            style="background-image: url('{{ asset('assets/img/banner/banner-2.jpg') }}')">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cr-left-side-contain slider-animation">
                                            <h5><span>100%</span>{{ $banner->tagline }}</h5>
                                            <h1>{{ $banner->title }}</h1>
                                            <p>
                                                {{ $banner->description }}
                                            </p>
                                            <div class="cr-last-buttons">
                                                <a href="{{ $banner->link }}" class="cr-button">
                                                    {{ $banner->button_cta }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
