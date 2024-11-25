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
                            <p>
                                <a href="{{ url('https://wa.me/' . preg_replace('/\D/', '', Value::get('phone')) . '?text=Olá%20gostaria%20de%20mais%20informações!') }}"
                                    target="_blank">
                                    {{ Value::get('phone') }}
                                </a>
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
                            <p>
                                <a href="https://maps.app.goo.gl/U2tapu93UuiudfRj7">
                                    {{ Value::get('address') }}
                                </a>
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
                            <p>
                                <a href="mailto:{{ Value::get('email') }}">{{ Value::get('email') }}</a>
                            </p>
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
                    <form id="contact_form" class="nexgen-simple-form">
                    @csrf
                        <div class="row form-group-margin">
                            <div class="col-12 col-md-6 m-0 p-2 input-group">
                                <input id="contact_name" type="text" name="name" class="form-control field-name"
                                    placeholder="nome*" required>
                            </div>
                            <div class="col-12 col-md-6 m-0 p-2 input-group">
                                <input id="contact_phone" type="tel" name="phone" class="form-control field-phone"
                                    placeholder="telefone*" required>
                            </div>
                            <div class="col-12 m-0 p-2 input-group">
                                <input id="contact_email" type="email" name="email" class="form-control field-email"
                                    placeholder="e-mail*" required>
                            </div>
                            <div class="col-12 m-0 p-2 input-group">
                                <textarea id="contact_subject" name="subject" class="form-control field-message" placeholder="assunto*" required></textarea>
                            </div>
                            <div class="col-12 m-0 p-2 input-group">
                                <textarea id="contact_message" name="message" class="form-control field-message" placeholder="mensagem*" required></textarea>
                            </div>
                            <div class="col-12 col-12 m-0 p-2 input-group">
                                <span id="message_error" class="form-alert hide"></span>
                                <span id="message_success" class="form-alert text-success hide"></span>
                            </div>
                            <div class="col-12 input-group m-0 p-2">
                                <button id="btn_submit_form" type="submit" class="btn btn-primary">ENVIAR</button>
                                <button id="btn_loader_form" type="button" class="btn btn-primary hide">
                                    Enviando &nbsp; <i class="fa fa-spinner fa-pulse"></i>
                                </button>
                            </div>
                        </div>
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
