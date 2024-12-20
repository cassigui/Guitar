    <!-- Footer -->
    <footer class="footer bg-off-white">
        <div class="container">
            <div class="row footer-top section-config">
                <div class="col-xl-4 col-lg-6 col-sm-12 cr-footer-border">
                    <div class="cr-footer-logo">
                        <div class="image">
                            <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="logo" class="logo">
                            <img src="{{ asset('assets/img/logo/dark-logo.png') }}" alt="logo" class="dark-logo">
                        </div>
                    </div>
                    <div class="cr-footer">
                        <h4 class="cr-sub-title cr-title-hidden">
                            Contato
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li class="location-icon">
                                {{ Value::get('address') }}
                            </li>
                            <li class="mail-icon">
                                <a href="mailto:{{ Value::get('email') }}">{{ Value::get('email') }}</a>
                            </li>
                            <li class="phone-icon">
                                <a href="{{ url('https://wa.me/' . preg_replace('/\D/', '', Value::get('phone')) . '?text=Olá%20gostaria%20de%20mais%20informações!') }}"
                                    target="_blank">
                                    {{ Value::get('phone') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-sm-12 col-12 cr-footer-border">
                    <div class="cr-footer">
                        <h4 class="cr-sub-title">
                            Nossa Empresa
                            <span class="cr-heading-res"></span>
                        </h4>
                        <ul class="cr-footer-links cr-footer-dropdown">
                            <li><a href="{{ url('/#sobre') }}">Sobre nós</a></li>
                            <li><a href="{{ url('/contato') }}">Contato</a></li>
                            <li><a href="{{ url('/produtos') }}">Produtos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-12 cr-footer-border mt-4 mt-md-0">
                    <div class="cr-footer cr-newsletter">
                        <div class="cr-payment">
                            <div class="cr-insta-slider swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="https://www.instagram.com" target="_blank" class="cr-payment-image">
                                            <img src="{{ asset('assets/img/insta/1.jpg') }}" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="https://www.instagram.com" target="_blank" class="cr-payment-image">
                                            <img src="{{ asset('assets/img/insta/2.jpg') }}" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="https://www.instagram.com" target="_blank" class="cr-payment-image">
                                            <img src="{{ asset('assets/img/insta/3.jpg') }}" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="https://www.instagram.com" target="_blank" class="cr-payment-image">
                                            <img src="{{ asset('assets/img/insta/4.jpg') }}" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="https://www.instagram.com" target="_blank" class="cr-payment-image">
                                            <img src="{{ asset('assets/img/insta/5.jpg') }}" alt="insta">
                                            <div class="payment-overlay"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cr-social-media">
                            <span>
                                <a href="https://www.facebook.com" target="_blank">
                                    <i class="ri-facebook-line"></i>
                                </a>
                            </span>
                            <span>
                                <a href="https://x.com" target="_blank">
                                    <i class="ri-twitter-x-line"></i>
                                </a>
                            </span>

                            <span>
                                <a href="https://www.instagram.com" target="_blank">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cr-last-footer row d-flex justify-content-center gap-3 gap-lg-0 align-items-center">
                <div class="col-10 text-center text-lg-start">
                    <p>GuitarWeRock Instrumentos Musicais.®<span id="copyright_year"> - Todos os direitos reservados.
                    </p>
                </div>
                <div class="col-4 col-lg-2">
                    <a href="https://webfloat.com.br" target="_blank" class="tooltip-item" data-toggle="tooltip"
                        data-placement="top" title="Desenvolvido por">
                        <img class="w-75" src="{{ asset('assets/img/logo/logowf.svg') }}"
                            alt="Webfloat Soluções Digitais" class="wf_footer_logo">
                    </a>
                </div>
            </div>
        </div>
    </footer>
