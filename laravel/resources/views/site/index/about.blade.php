    <!-- Sobre -->
    <section class="section-config bg-off-white">
        <!-- About -->
        <section class="section-about" id="sobre">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cr-about" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                            <h4 class="heading">{!! Value::get('about_title') !!}</h4>
                            <div class="cr-about-content">
                                <p>
                                {!! nl2br(Value::get('about_text', 'Texto padrão')) !!}
                                </p>
                                <div class="elementor-counter">
                                    <div class="row ">
                                        <div class="col-sm-4 col-12">
                                            <h4 class="elementor">
                                                <span class="elementor-counter-number">
                                                {!! Value::get("num_clientes") ? Value::get("num_clientes") : 1.2!!}</span>
                                                <span class="elementor-suffix">Mil</span>
                                            </h4>
                                            <div class="elementor-counter-title">
                                                <span>Clientes</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <h4 class="elementor">
                                                <span class="elementor-counter-number">
                                                {!! Value::get("num_marcas") ? Value::get("num_marcas") : 40!!}
                                                </span>
                                            </h4>
                                            <div class="elementor-counter-title">
                                                <span>Marcas</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-12">
                                            <h4 class="elementor">
                                                <span class="elementor-counter-number">
                                                {!! Value::get("num_funcionarios") ? Value::get("num_funcionarios") : 200!!}
                                                </span>
                                            </h4>
                                            <div class="elementor-counter-title">
                                                <span>Funcionários</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cr-about-image" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                            <img src="{{ asset('assets/img/about/1.j') }}pg" alt="side-view">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-services-border" data-aos="fade-up" data-aos-duration="2000">
                            <div class="cr-service-slider swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="cr-services">
                                            <div class="cr-services-image">
                                                <i class="ri-red-packet-line"></i>
                                            </div>
                                            <div class="cr-services-contain">
                                                <h4>Embalagens de Qualidade</h4>
                                                <p>As embalagens são de excelente qualidade, garantindo proteção e
                                                    conservação dos produtos.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="cr-services">
                                            <div class="cr-services-image">
                                                <i class="ri-customer-service-2-line"></i>
                                            </div>
                                            <div class="cr-services-contain">
                                                <h4>Suporte eficiente</h4>
                                                <p>O suporte da nossa loja é ágil e confiável, sempre pronto para
                                                    atender os clientes.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="cr-services">
                                            <div class="cr-services-image">
                                                <i class="ri-truck-line"></i>
                                            </div>
                                            <div class="cr-services-contain">
                                                <h4>Entrega em 5 dias</h4>
                                                <p>A entrega das encomendas é rápida e segura, garantindo que seu
                                                    pedido chegue no prazo.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="cr-services">
                                            <div class="cr-services-image">
                                                <i class="ri-money-dollar-box-line"></i>
                                            </div>
                                            <div class="cr-services-contain">
                                                <h4>Pagamento Seguro</h4>
                                                <p>O pagamento é totalmente seguro, com diversas opções para sua
                                                    comodidade e confiança.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
