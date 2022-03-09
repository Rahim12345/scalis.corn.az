@extends('front.layout.master')

@section('title') {{ __('menus.career') }} @endsection
@section('css')

@endsection

@section('content')
    <div class="main-full">
        <!--PRODUCT BANNER SECTION========================-->
        <section class="product-banner banner-img fix">
            <div class="img container-fluid">
                <div class="banner-img wow animate__animated animate__fadeIn animate__fast">
                    <img src="{{ \App\Helpers\Options::getOption('career_banner') == '' ? asset('scalis/img/about/about.png') : asset('files/career/'.\App\Helpers\Options::getOption('career_banner')) }}" alt="">
                </div>
            </div>
            <div class="text container-fluid">
                <div class="banner-text">
                    <h1 class="banner-title wow animate__animated animate__slideInLeft animate__fast" >{{ __('menus.career') }}</h1>
                </div>
            </div>
        </section>
        <!--PRODUCT BANNER SECTION========================-->
        <!--CHOOSE SECTION========================-->
        <div class="contact_page fix ff9" style="background-color: #fff;">
            <div class="container" >
                <div class="about-text">
                    <h1 class="about-title wow animate__animated animate__zoomIn animate__fast" >{{ __('menus.career') }}</h1>
                    <div class="line" ></div>
                    <p class="wow animate__animated animate__fadeInLeft carerrText" style="border-bottom: 2px solid #E5E5E5; padding-bottom: 30px; text-align: justify;" data-wow-duration="2s">{!! \App\Helpers\Options::getOption('career_'.app()->getLocale()) !!}</p>
                    <h1 class="about-title wow animate__animated animate__zoomIn animate__fast carerrText2" style="padding-top: 50px;" >{{ __('static.muraciet_ucun_erize') }}</h1>
                </div>
            </div>
        </div>
        <!--CHOOSE SECTION========================-->
        <!--CONTACT BODY SECTION========================-->
        <section class="career fullWidth">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 ff8">
                        <div class="career__left wow animate__animated animate__bounceInUp animate__fast">
                            <a >
                                <button  onclick="document.getElementById('getFileCv').click()" id="getFileCvBtn" data-name="{{ __('static.cv') }}">{{ __('static.cv') }}</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ff8">
                        <div class="career__right wow animate__animated animate__bounceInUp animate__fast">
                            <a >
                                <button  onclick="document.getElementById('getFileCharacteristics').click()" id="getFileCharacteristicsBtn" data-name="{{ __('static.xasiyyetname') }}">{{ __('static.xasiyyetname') }}</button>
                            </a>
                        </div>
                    </div>
                    <div class="submit-btn wow animate__animated animate__bounceInUp animate__fast">

                        <form action="{{ route('front.career.post') }}" method="POST" id="careerForm" enctype="multipart/form-data" onsubmit="return false">
                            @csrf
                            <input type='file' id="getFileCv" name="getFileCv" style="display:none" accept=".pdf">
                            <input type='file' id="getFileCharacteristics" name="getFileCharacteristics" style="display:none" accept=".pdf">
                            <button type="button" class="btn btn-info hvr-sweep-to-right frombutton" id="careerBtn">{{ __('static.gonder') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--CONTACT BODY SECTION========================-->
        @include('front.includes.contact-details')
    </div>
@endsection

@section('js')
    <script src="{{ asset('front/js/career.js') }}"></script>
@endsection
