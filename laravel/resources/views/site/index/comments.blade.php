    @if($comments->count() > 0)
    <section class="section-testimonial section-config bg-off-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div data-aos="fade-up" data-aos-duration="2000">
                        <div class="cr-banner mb-5">
                            <h2>Depoimentos de Clientes</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-testimonial-slider swiper-container">
                        <div class="swiper-wrapper cr-testimonial-pt-50">

                            @foreach ($comments as $comment)
                                <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="cr-testimonial">
                                        <div class="cr-testimonial-image">
                                            <img src="{{$comment->image->path_s3}}" alt="{{$comment->name}}">
                                        </div>
                                        <div class="cr-testimonial-inner">
                                            <span>{{ $comment->profession }}</span>
                                            <h4 class="title">{{ $comment->name }}</h4>
                                            <p>
                                                “{{ $comment->message }}”
                                            </p>
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
    @endif
