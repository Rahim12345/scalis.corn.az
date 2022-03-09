@extends('front.layout.master')

@section('title') {{ __('menus.brends') }} @endsection
@section('css')

@endsection

@section('content')
    <div class="main-full">
        <!--PRODUCT BANNER SECTION========================-->
        <section class="product-banner banner-img fix">
            <div class="img container-fluid">
                <div class="banner-img wow animate__animated animate__fadeIn animate__fast">
                    <img src="{{ \App\Helpers\Options::getOption('brend_banner') == '' ? asset('scalis/img/about/about.png') : asset('files/brends/'.\App\Helpers\Options::getOption('brend_banner')) }}" alt="">
                </div>
            </div>
            <div class="text container-fluid">
                <div class="banner-text">
                    <h1 class="banner-title wow animate__animated animate__slideInLeft animate__fast" >{{ __('menus.brends') }}</h1>
                </div>
            </div>
        </section>
        <!--PRODUCT BANNER SECTION========================-->
        <!--BREND  SECTION========================-->
        <section class="brend_page fix" style="background: #fff;">
            <div class="container" >
                <div class="about-text">
                    <h1 class="about-title wow animate__animated animate__zoomIn animate__fast">{{ __('menus.brends') }}</h1>
                    <div class="line"></div>
                </div>
            </div>
            <div class="container-fluid " style="background: #fff;">
                <div class="col-lg-12 ff5">
                    @foreach($brends as $brend)
                    <a href="#" class="">
                        <div class="imag">
                            <img src="{{ asset('files/brends/'.$brend->src) }}" alt="">
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
        <!--BREND SECTION========================-->
    </div>
@endsection

@section('js')

@endsection
