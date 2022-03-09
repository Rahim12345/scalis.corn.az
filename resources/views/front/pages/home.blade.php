@extends('front.layout.master')

@section('title') {{ __('menus.home') }} @endsection
@section('css')

@endsection

@section('content')
    <div class="main-full">
        <!--VIDEO SECTION========================-->
        <section class="main-banner video-banner fix">
            <div class="overlay"></div>
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="{{ \App\Helpers\Options::getOption('video_banner') != '' ? asset('files/video-banner/'.\App\Helpers\Options::getOption('video_banner')) : asset('scalis/video/home-video.mp4') }}" type="video/mp4">
            </video>
            <div class="container-fluid ">
                <div class="banner-text tp-banner">
                    @php
                    $text = explode('***',__('static.home_banner_text'));
                    @endphp
                    <h1 class="banner-title wow animate__animated animate__slideInLeft animate__fast" >{{ $text[0] }}</h1>
                    <h2 class="banner-title wow fw-light animate__animated animate__fadeInLeft animate__fast" >
                        {{ $text[1] }}</h2>
                </div>
            </div>
        </section>
        <!--VIDEO SECTION========================-->
        <!---data-wow-duration="2s"-->
        <!--ABOUT SECTION========================-->
        <section class="about fix">
            <div class="container-fluid">
                <div class="about-text">
                    <h1 class="about-title wow animate__animated animate__zoomIn animate__fast" >{{ __('menus.about') }}</h1>
                    <div class="line wow animate__animated animate__zoomIn animate__fast" ></div>
                    <p class="wow animate__animated animate__fadeInUp animate__fast" >{{ \App\Helpers\Options::getOption('title_'.app()->getLocale()) }}</p>
                </div>
                <div class="about-pic">
                    <div class="about_pic_img ">
                        <img class="wow animate__animated animate__fadeInLeft animate__fast"
                             src="{{ \App\Helpers\Options::getOption('upload_left_side_image') == '' ? asset('scalis/img/about/about.png') : asset('files/about/'.\App\Helpers\Options::getOption('upload_left_side_image')) }}" alt="">
                    </div>
                    <div class="about_pic_text ">
                        <p class="wow animate__animated animate__fadeInRight animate__fast" >{!! \App\Helpers\Options::getOption('about_us_'.app()->getLocale()) !!}</p>
                        <button type="submit" class="btn wow animate__animated animate__fadeInUp animate__fast" ><a
                                href="{{ route('front.about') }}">{{ __('static.etrafli') }}</a><i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <!--ABOUT SECTION========================-->
        @include('front.includes.contact-details')
    </div>
@endsection

@section('js')

@endsection
