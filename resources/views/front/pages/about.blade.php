@extends('front.layout.master')

@section('title') {{ __('menus.about') }} @endsection
@section('css')
<style>
    p {
        font-family: 'Montserrat', sans-serif !important;
    }
    strong {
        font-family: 'Montserrat', sans-serif !important;
        font-weight: bold;
    }
    @media screen and (max-width: 550px) {
        img{
            width: 100% !important;
            height:auto !important;
            align: center !important;
            display:block !important;
            margin: 0 auto !important;
        }
    }
</style>
@endsection

@section('content')
    <div class="main-full">
        <!--PRODUCT BANNER SECTION========================-->
        <section class="product-banner banner-img fix">
            <div class="img container-fluid">
                <div class="banner-img wow animate__animated animate__fadeIn">
                    <img src="{{ $about !== null ? asset('files/about/'.$about->banner_image) : asset('scalis/img/about/about.png') }}" alt="">
                </div>
            </div>
            <div class="text container-fluid">
                <div class="banner-text">
                    <h1 class="banner-title wow animate__animated animate__slideInLeft animate__fast"  >{{ __('menus.about') }}</h1>
                </div>
            </div>
        </section>
        <!--PRODUCT BANNER SECTION========================-->
        <!--ABOUT SECTION========================-->
        <section class="about_page fix">
            <div class="container-fluid">
                {!! $about !== null ? $about->{'about_us_'.app()->getLocale()} : '' !!}
            </div>

        </section>
        <!--ABOUT SECTION========================-->
        @include('front.includes.contact-details')
    </div>
@endsection

@section('js')

@endsection
