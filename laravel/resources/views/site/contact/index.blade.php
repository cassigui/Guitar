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
    <!-- Contact -->
    <section class="section-Contact section-config">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Entre em Contato</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-24">
                <div class="col-lg-4 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="400">
                    <div class="cr-info-box">
                        <div class="cr-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="cr-info-content">
                            <h4 class="heading">Contato</h4>
                            <p><a href="javascript:void(0)">(+55) 9876X-XXXX</a>
                            </p>
                            <p><a href="javascript:void(0)">(+55) 98764-XXXX</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="600">
                    <div class="cr-info-box">
                        <div class="cr-icon">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="cr-info-content">
                            <h4 class="heading">Email</h4>
                            <p><a href="javascript:void(0)">
                                    suporte@gmail.com</a></p>
                            </p>
                            <p><a href="javascript:void(0)">
                                    contato@gmail.com</a></p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                    <div class="cr-info-box">
                        <div class="cr-icon">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <div class="cr-info-content">
                            <h4 class="heading">Endereço</h4>
                            <p><a href="javascript:void(0)">140 Ruami Moraes
                                    Filho,
                                    987 - Salvador - MA, 40352, Brasil.</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row padding-t-100 mb-minus-24">
                <div class="col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.9542350152365!2d-50.16206082462135!3d-25.10341047777141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e81a0fc459213b%3A0xc3ceb763be77c38b!2sWebfloat%20Solu%C3%A7%C3%B5es%20Digitais!5e0!3m2!1sen!2sbr!4v1730981769282!5m2!1sen!2sbr"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
                    <form class="cr-content-form" id="contact-form">
                        <div class="form-group">
                            <label for="nome" class="d-none"></label>
                            <input id="nome" name="nome" type="text" placeholder="Nome completo"
                                class="cr-form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="d-none"></label>
                            <input id="email" name="email" type="email" placeholder="Email" class="cr-form-control">
                        </div>
                        <div class="form-group">
                            <label for="celular" class="d-none"></label>
                            <input id="celular" name="celular" type="text" placeholder="Celular"
                                class="cr-form-control">
                        </div>
                        <div class="form-group">
                            <label for="mensagem" class="d-none"></label>
                            <textarea id="mensagem" name="mensagem" class="cr-form-control" rows="4" placeholder="Mensagem"></textarea>
                        </div>
                        <button type="submit" class="cr-button" data-toggle="modal"
                            data-target="#exampleModal">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('linkscripts')
@endpush

@push('scripts')
@endpush
