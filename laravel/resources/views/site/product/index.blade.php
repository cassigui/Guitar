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
    <section class="section-product-full section-config">
        <div class="container">
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                    <div class="vehicle-detail-banner banner-content">

                        <div class="banner-slider">

                            <div class="slider slider-for">

                                @foreach ($product->images as $image)
                                    <div>
                                        <div class="zoom-image-hover">
                                            <img src="{{ $image->path_s3 }}" alt="{{ $product->name }}"
                                                class="imagem-principal">
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="slider slider-nav thumb-image">

                                @foreach ($product->images as $image)
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="{{ $image->path_s3 }}" alt="{{ $product->name }}"
                                                class="imagem-principal">
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                    <div class="cr-size-and-weight-contain">
                        <h2 class="heading" id="titulo"></h2>
                        <p id="texto"></p>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="list">
                            <ul>
                                <li><label>Marca<span>:</span></label><span id="marca">
                                        {{ isset($product->brand) ? $product->brand->name : 'Sem marca' }}
                                    </span></li>

                                <li><label>Categoria <span>:</span></label>
                                    @if (isset($product->categories) && $product->categories->isNotEmpty())
                                        @foreach ($product->categories as $category)
                                            <span class="categorias text-white" id="categoria">{{ $category->name }}</span>
                                        @endforeach
                                    @else
                                        <span id="categoria">Sem categoria</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="cr-product-price">
                            <span class="old-price">R${{ $product->price }}</span>
                            <span class="new-price">R${{ $product->promo_price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-12">
                    <div class="cr-paking-delivery">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Descrição</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p id="desc">{{ $product->description }}</p>
                                    </div>
                                    <h4 class="heading">Embalagens e Envio</h4>
                                    <div class="cr-description">
                                        <p>
                                            Embalagens e envio são essenciais para garantir que os produtos cheguem
                                            seguros e no prazo estipulado. A escolha da embalagem depende do tipo e
                                            fragilidade do item, protegendo-o durante o transporte. O envio envolve a
                                            logística de entrega, considerando prazos, custos e métodos eficientes. A
                                            agilidade e rastreabilidade são fundamentais para a satisfação do cliente,
                                            assegurando que o produto chegue em perfeito estado.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
