@extends('front.layout.master')

@section('title') {{ __('menus.products') }} - {{ $cari->mainMenus->{'name_'.app()->getLocale()} }} @endsection
@section('css')

@endsection

@section('content')
    <div class="main-full">
        <!--PRODUCT BANNER SECTION========================-->
        <section class="product-banner banner-img fix">
            <div class="img container-fluid">
                <div class="banner-img wow animate__animated animate__fadeIn animate__fast">
                    <img src="/img/products/details/1.png" alt="">
                </div>
            </div>
            <div class="text container-fluid">
                <div class="banner-text">
                    <h1 class="banner-title  wow animate__animated animate__slideInLeft animate__fast" >Mebel</h1>
                    <h2 class="banner-title light wow fw-light animate__animated animate__fadeInLeft animate__fast" >materialları</h2>
                </div>
            </div>
        </section>
        <!--PRODUCT BANNER SECTION========================-->
        <!--PRODUCT SECTION========================-->
        <section class="products_section fix">
            <div class="container">
                <div class="about-text">
                    <h1 class="about-title wow animate__animated animate__zoomIn animate__fast">{{ $cari->mainMenus->{'name_'.app()->getLocale()} }}</h1>
                    <div class="line"></div>
                    <p class="wow animate__animated animate__fadeInUp">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum non deleniti ducimus repellat est molestiae maxime, aperiam obcaecati nostrum, culpa quae tenetur dolor et in a, qui asperiores numquam magnam.</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 wow animate__animated animate__fadeInLeft animate__fast">
                        <div class="products_section_category ">
                            <h3>{{ $cari->mainMenus->{'name_'.app()->getLocale()} }}</h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @foreach($cari_main->sub_one_menus as $sub_one_menu)
                                    <a class="nav-item nav-link active menus-item" id="nav-aa-tab" data-toggle="tab" href="#nav-aa" role="tab" aria-controls="nav-aa" aria-selected="true">{{ $sub_one_menu->{'name_'.app()->getLocale()} }}</a>
                                    @endforeach
                                </div>
                            </nav>
                        </div>
                        <div class="products_section_category cat-two" >
                            <nav>
                                <div class="nav nav-tabs fade show active" id="nav-tab-two" role="tablist">
                                    @foreach($cari->sub_two_menus as $sub_two_menu)
                                    <a class="nav-item nav-link active" id="nav-aa-tab" data-toggle="tab" href="#nav-aa" role="tab" aria-controls="nav-aa" aria-selected="true">Akril panel</a>
                                    @endforeach
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-9 wow animate__animated animate__fadeInRight animate__fast">
                        <div class="products_section_body"  id="nav-tabContent">
                            <div class="products-section_body_fra fade show active" id="nav-aa" role="tabpanel" aria-labelledby="nav-aa-tab">
                                <div class="col-lg-12 products_section_body_gallery">
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color1.png" alt="">
                                            <p>Beyaz</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color2.png" alt="">
                                            <p>Kaşmir</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color3.png" alt="">
                                            <p>Krem</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color4.png" alt="">
                                            <p>Vizon</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color5.png" alt="">
                                            <p>Antrasit</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="products-section_body_fra fade " id="nav-bb" role="tabpanel" aria-labelledby="nav-bb-tab">
                                <div class="col-lg-12 products_section_body_gallery">
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color1.png" alt="">
                                            <p>Beyaz</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color2.png" alt="">
                                            <p>Kaşmir</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color3.png" alt="">
                                            <p>Krem</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color4.png" alt="">
                                            <p>Vizon</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color5.png" alt="">
                                            <p>Antrasit</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="products-section_body_fra fade " id="nav-cc" role="tabpanel" aria-labelledby="nav-cc-tab">
                                <div class="col-lg-12 products_section_body_gallery">
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color1.png" alt="">
                                            <p>Beyaz</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color2.png" alt="">
                                            <p>Kaşmir</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color3.png" alt="">
                                            <p>Krem</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color4.png" alt="">
                                            <p>Vizon</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color5.png" alt="">
                                            <p>Antrasit</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="products-section_body_fra fade " id="nav-dd" role="tabpanel" aria-labelledby="nav-dd-tab">
                                <div class="col-lg-12 products_section_body_gallery">
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color1.png" alt="">
                                            <p>Beyaz</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color2.png" alt="">
                                            <p>Kaşmir</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color3.png" alt="">
                                            <p>Krem</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color4.png" alt="">
                                            <p>Vizon</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color5.png" alt="">
                                            <p>Antrasit</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="products-section_body_fra fade " id="nav-ee" role="tabpanel" aria-labelledby="nav-ee-tab">
                                <div class="col-lg-12 products_section_body_gallery">
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color1.png" alt="">
                                            <p>Beyaz</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color2.png" alt="">
                                            <p>Kaşmir</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color3.png" alt="">
                                            <p>Krem</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color4.png" alt="">
                                            <p>Vizon</p>
                                        </div>
                                    </a>
                                    <a href="products-deail-one.html">
                                        <div class="imag ">
                                            <img src="img/products/details/color5.png" alt="">
                                            <p>Antrasit</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--PRODUCT SECTION========================-->
        <!--CHOOSE SECTION========================-->
        @include('front.includes.contact-details')
        <!--CHOOSE SECTION========================-->
    </div>
@endsection

@section('js')
    <script src="{{ asset('front/js/contact.js') }}"></script>
@endsection
