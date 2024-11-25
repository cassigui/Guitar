@extends('layouts.site')

@section('meta_title')
    {{ $seo->title }}
@endsection
@section('meta_description')
    {{ $seo->description }}
@endsection
@section('meta_image')
    @if (!empty($seo->image))
        {{ config('filesystems.disks.s3.url') . $seo->image['path'] }}
    @endif
@endsection
@section('title')
    {{ $seo->title }}
@endsection

@section('content')
    <!-- Shop -->
    <section class="section-shop section-config">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                    <div class="row">
                        <div class="col-12">
                            <div class="cr-shop-bredekamp">
                                <div class="cr-toggle">
                                    <a href="javascript:void(0)" class="gridCol active-grid">
                                        <i class="ri-grid-line"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="gridRow">
                                        <i class="ri-list-check-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row col-50 mb-minus-24">

                        @foreach ($products as $product)
                            <div class="col-lg-3 col-6 cr-product-box mb-24">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ isset($product->image) ? $product->image->path_s3 : asset('assets/img/product/dummy.jpg') }}"
                                                alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                    <div class="cr-product-details">

                                        <div class="row categorias-align">
                                            @foreach ($product->categories as $category)
                                                <div class="categorias col-10 col-md-5">
                                                    <a class="m-auto text-white">{{ $category->name }}</a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a href="produto/{{ $product->slug }}/{{ $product->id }}"
                                            class="title">{{ $product->name }}</a>
                                        <p>{{ $product->description }}</p>
                                        @if (isset($product->promo_price) && $product->promo_price > 0)
                                            <p class="cr-price"><span
                                                    class="new-price">R${{ $product->promo_price }}</span>
                                                <span class="old-price">R${{ $product->price }}</span>
                                            </p>
                                        @else
                                            <p class="cr-price"><span class="new-price">R${{ $product->price }}</span>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('linkscripts')
@endpush

@push('scripts')
@endpush
