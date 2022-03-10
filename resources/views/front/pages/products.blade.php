@extends('front.layout.master')

@section('title') {{ __('menus.products') }} @endsection
@section('css')

@endsection

@section('content')
    <div class="main-full">
        <!--PRODUCT SECTION========================-->
        <section class="product-banner banner-img fix">
            <div class="img container-fluid">
                <div class="banner-img wow animate__animated animate__fadeIn animate__fast">
                    <img src="{{ asset('files/about/'.\App\Helpers\Options::getOption('upload_left_side_image')) }}" alt="">
                </div>
            </div>
            <div class="text container-fluid">
                <div class="banner-text">
                    <h1 class="banner-title wow animate__animated animate__slideInLeft animate__fast" >{{ __('menus.products') }}</h1>
                </div>
            </div>
        </section>
        <!--PRODUCT SECTION========================-->
        <!--ALLPRODUCT SECTION========================-->
        <section class="allproducts fix" >
            <div class="container">
                <div class="about-text">
                    <h1 class="about-title wow animate__animated animate__zoomIn animate__fast " id="headingTop">{{ $cari->{'name_'.app()->getLocale()} }}</h1>
                    <div class="line" ></div>
                    <p class="wow animate__animated animate__fadeInUp">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum non deleniti ducimus repellat est molestiae maxime, aperiam obcaecati nostrum, culpa quae tenetur dolor et in a, qui asperiores numquam magnam.</p>
                </div>
                <div class="allproducts_category wow animate__animated animate__fadeInUp animate__fast">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @foreach($main_menus as $main_menu)
                            <a class="nav-item nav-link {{ $main_menu->main_menu_id  == $cari->main_menu_id ? 'active' : '' }}
                                {{ $main_menu->main_menu_id  == $cari->main_menu_id ? 'heading1' : 'heading4' }} "
                               href="{{ route('front.products.main_menu',['main_menu'=>$main_menu->{'slug_'.app()->getLocale()}]) }}"
                               >{{ $main_menu->{'name_'.app()->getLocale()} }}</a>
{{--                            <a class="nav-item nav-link heading4" onclick="change_text4();" id="nav-dd-tab" data-toggle="tab" href="#nav-dd" role="tab" aria-controls="nav-dd" aria-selected="true">Qida</a>--}}
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="allproducts_body " id="nav-tabContent" >
                    <div class="allproducts_fra fade show active" id="nav-aa" role="tabpanel" aria-labelledby="nav-aa-tab">
                        <div class="col-lg-12 allproducts_gallery">
                            @foreach(array_chunk($cari->sub_one_menus->toArray(), 3) as $chunk)
                            <div class="col-lg-6 f1 wow animate__animated animate__fadeInLeft animate__fast">

                                <?php
                                $n = 1;

                                ?>
                                @foreach($chunk as $sub_one_menu)
                                    @if($n<=2)
                                <div class="col-lg-6 col-md-6 col-sm-6 f2">
                                    <div class="allproducts_block width-1">
                                        <a href="{{ route('front.products.main_menu.sub_menu_1',['main_menu'=>$cari->{'slug_'.app()->getLocale()},'sub_menu_1'=>$sub_one_menu['slug_'.app()->getLocale()]]) }}">
                                            <div class="img_wrap">
                                                <img src="img/products/1.png" alt="">
                                                <div class="content-wrap hvr-shutter-in-vertical">
                                                    <a href="{{ route('front.products.main_menu.sub_menu_1',['main_menu'=>$cari->{'slug_'.app()->getLocale()},'sub_menu_1'=>$sub_one_menu['slug_'.app()->getLocale()]]) }}">
                                                        <div class="border">
                                                            <div class="content">
                                                                <a href="{{ route('front.products.main_menu.sub_menu_1',['main_menu'=>$cari->{'slug_'.app()->getLocale()},'sub_menu_1'=>$sub_one_menu['slug_'.app()->getLocale()]]) }}"><h4>{{ $sub_one_menu['name_'.app()->getLocale()] }}</h4></a>
                                                                <!-- <a href="products.html"><span>Text2</span></a> -->
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                        @endif
                                    <?php
                                    $n++;
                                    ?>
                                @endforeach
                            </div>

                                <?php
                                $n = 1;

                                ?>
                                @foreach($chunk as $sub_one_menu)
                                    @if($n == 3)
                            <div class="col-lg-6 col-md-12 col-sm-12 wow animate__animated animate__fadeInRight animate__fast f2">
                                <a href="{{ route('front.products.main_menu.sub_menu_1',['main_menu'=>$cari->{'slug_'.app()->getLocale()},'sub_menu_1'=>$sub_one_menu['slug_'.app()->getLocale()]]) }}">
                                    <div class="allproducts_block width-3  col-lg-12 col-md-12">
                                        <div class="img_wrap">
                                            <img src="img/products/5.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="{{ route('front.products.main_menu.sub_menu_1',['main_menu'=>$cari->{'slug_'.app()->getLocale()},'sub_menu_1'=>$sub_one_menu['slug_'.app()->getLocale()]]) }}"><h4>{{ $sub_one_menu['name_'.app()->getLocale()] }}</h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                                    @endif
                                    <?php
                                    $n++;
                                    ?>
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                    <div class="allproducts_fra fade" id="nav-bb" role="tabpanel" aria-labelledby="nav-bb-tab">
                        <div class="col-lg-12 allproducts_gallery">
                            <div class="col-lg-6 f1">
                                <div class="col-lg-6 col-md-6 col-sm-6 f2">
                                    <div class="allproducts_block width-1">
                                        <a href="products.html">
                                            <div class="img_wrap">
                                                <img src="img/products/1.png" alt="">
                                                <div class="content-wrap hvr-shutter-in-vertical">
                                                    <a href="products-deails.html">
                                                        <div class="border">
                                                            <div class="content">
                                                                <a href="products.html"><h4>Фурнитура</h4></a>
                                                                <!-- <a href="products.html"><span>Text2</span></a> -->
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/products/2.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="products-deails.html"><h4>Петли</h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/products/3.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="products-deails.html"><h4>Подъемные механизмы</h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/products/4.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="products-deails.html"><h4>Системы фурнитуры </h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 f2">
                                <div class="allproducts_block width-3  col-lg-12 col-md-12">
                                    <div class="img_wrap">
                                        <img src="img/products/5.png" alt="">
                                        <div class="content-wrap hvr-shutter-in-vertical">
                                            <div class="border">
                                                <div class="content">
                                                    <a href="products-deails.html"><h4>Подъемные механизмы</h4></a>
                                                    <!-- <a href="#"><span>Text2</span></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="allproducts_block width-3  col-lg-12 col-md-12">
                                    <div class="img_wrap">
                                        <img src="img/products/5.png" alt="">
                                        <div class="content-wrap hvr-shutter-in-vertical">
                                            <div class="border">
                                                <div class="content">
                                                    <a href="products-deails.html"><h4>Роликовые направляющие</h4></a>
                                                    <!-- <a href="#"><span>Text2</span></a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="allproducts_fra fade" id="nav-cc" role="tabpanel" aria-labelledby="nav-cc-tab">
                        <div class="col-lg-12 allproducts_gallery">
                            <div class="col-lg-12 f1 ">
                                <div class="col-lg-4 col-md-4 col-sm-6 f2">
                                    <div class="allproducts_block width-1">
                                        <a href="products.html">
                                            <div class="img_wrap">
                                                <img src="img/products/1.png" alt="">
                                                <div class="content-wrap hvr-shutter-in-vertical">
                                                    <a href="products.html">
                                                        <div class="border">
                                                            <div class="content">
                                                                <a href="products-deails.html"><h4>qapı</h4></a>
                                                                <!-- <a href="products.html"><span>Text2</span></a> -->
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/products/2.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="products-deails.html"><h4>laminat parket</h4></a>
                                                        <!-- <a href="#"><span>parket</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/products/3.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="products-deails.html"><h4>profillər</h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="allproducts_fra fade" id="nav-dd" role="tabpanel" aria-labelledby="nav-dd-tab">
                        <div class="col-lg-12 allproducts_gallery">
                            <div class="col-lg-6 f1">
                                <div class="col-lg-6 col-md-6 f2">
                                    <div class="allproducts_block width-1">
                                        <div class="img_wrap">
                                            <img src="img/gida/1.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="gida-deails.html"><h4>Brest litvosk</h4></a>
                                                        <!-- <a href="gida-deails.html"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/gida/2.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="gida-deails.html"><h4>ülkər</h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/gida/3.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="gida-deails.html"><h4>чудо</h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 f2">
                                    <div class="allproducts_block width-2">
                                        <div class="img_wrap">
                                            <img src="img/gida/1.png" alt="">
                                            <div class="content-wrap hvr-shutter-in-vertical">
                                                <div class="border">
                                                    <div class="content">
                                                        <a href="gida-deails.html"><h4>агуша</h4></a>
                                                        <!-- <a href="#"><span>Text2</span></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="allproducts_block width-3 height-1 col-lg-12 ">
                                    <div class="img_wrap">
                                        <img src="img/gida/4.png" alt="">
                                        <div class="content-wrap hvr-shutter-in-vertical">
                                            <div class="border">
                                                <div class="content">
                                                    <a href="gida-deails.html"><h4>ессенутки</h4></a>
                                                    <!-- <a href="#"><span>Text2</span></a> -->
                                                </div>
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
        <!--ALLPRODUCT SECTION========================-->
        <!--CHOOSE SECTION========================-->
        @include('front.includes.contact-details')
        <!--CHOOSE SECTION========================-->
    </div>
@endsection

@section('js')
    <script src="{{ asset('front/js/contact.js') }}"></script>
@endsection
