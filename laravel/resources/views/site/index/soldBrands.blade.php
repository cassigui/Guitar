    <!-- Marcas Vendidas -->
    <section class="section-product-banner section-config">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-banner-slider swiper-container">
                        <div class="swiper-wrapper">

                            @foreach ($brands as $brand)
                                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="cr-product-banner-image">
                                        <img src="{{ isset($brand->image) ? $brand->image->path_s3 : asset('assets/img/brands/dummy.jpg') }}">
                                        <div class="cr-product-banner-contain">
                                            <div class="cr-product-banner-buttons">
                                                <!-- <a href="shop-left-sidebar.html" class="cr-button">shop now</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
