    <!-- Produtos vendidos -->
    <section class="section-config">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner mb-5">
                            <h2>Alguns de Nossos Produtos</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-6 cr-product-box" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="300">
                    <div class="cr-product-csc cr-product-card">
                        <div class="cr-product-image">
                            <div class="cr-image-inner">
                                <img src="{{$product->image->path_s3}}" alt="{{$product->title}}">
                            </div>
                        </div>
                        <div class="cr-product-details">
                            <a href="produto/{{$product->slug}}/{{$product->id}}" class="title">{{$product->name}}</a>
                            <p>
                                {{$product->description}}
                            </p>
                            <p class="cr-price"><span class="new-price">R${{$product->price}}</span> <span
                                    class="old-price">R${{$product->promo_price}}</span></p>
                        </div>
                    </div>
                </div>
            @endforeach    

                <div>
                    <a href="produtos" class="cr-button col-md-4 col-xl-2 col-12 me-auto ms-auto mt-5">Ver
                        mais</a>
                </div>

            </div>
        </div>
    </section>
