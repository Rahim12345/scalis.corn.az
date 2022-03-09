@extends('front.layout.master')

@section('title') {{ __('menus.contact') }} @endsection
@section('css')

@endsection

@section('content')
    <div class="main-full">
        <!--PRODUCT BANNER SECTION========================-->
        <section class="product-banner banner-img fix">
            <div class="img container-fluid">
                <div class="banner-img wow animate__animated animate__fadeIn animate__fast">
                    <img src="{{ asset('files/contact/'.\App\Helpers\Options::getOption('contact_image')) }}" alt="">
                </div>
            </div>
            <div class="text container-fluid">
                <div class="banner-text">
                    <h1 class="banner-title wow animate__animated animate__slideInLeft animate__fast" >{{ __('menus.contact') }}</h1>
                </div>
            </div>
        </section>
        <!--PRODUCT BANNER SECTION========================-->
        <!--CHOOSE SECTION========================-->
        <div class="contact_page fix" style="background-color: #fff;">
            <div class="container" >
                <div class="about-text">
                    <h1 class="about-title wow animate__animated animate__zoomIn animate__slow" >{{ __('menus.contact') }}</h1>
                    <div class="line" ></div>
                </div>
            </div>
        </div>
        <!--CHOOSE SECTION========================-->
        <!--CONTACT BODY SECTION========================-->
        <section class="contact_body fix">
            <div class="container wow animate__animated animate__fadeInUp animate__fast">
                <div class="row">
                    <form class="contact-form" id="contactForm" action="{{ route('front.contact.post') }}" onsubmit="return false">
                        <input type="text" name="name" id="name" placeholder="{{ __('static.ad_soyad') }}">
                        <input type="email" name="email" id="email2" placeholder="{{ __('login.email') }}">
                        <input type="text" name="telno" id="telno" placeholder="{{ __('static.nomre') }}">
                        <div class="col-lg-12 col-md-12">
                            <textarea class="textarea" name="message" id="message" placeholder="{{ __('static.mesaj') }}"></textarea>
                        </div>
                        <div class="submit-btn">
                            <button type="button" class="btn btn-info hvr-sweep-to-right frombutton" id="contactBtn">{{ __('static.gonder') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--CONTACT BODY SECTION========================-->
        <!--CHOOSE SECTION========================-->
        @include('front.includes.contact-details')
        <!--CHOOSE SECTION========================-->
    </div>
@endsection

@section('js')
    <script src="{{ asset('front/js/contact.js') }}"></script>
@endsection
