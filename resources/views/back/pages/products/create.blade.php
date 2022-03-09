@extends('back.layout.master')

@section('title') {{ __('menus.products') }} @endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .dropdown-toggle::after, a.dropdown-item.dropdown-toggle::after{
        display: none;
    }
</style>
@endsection

@section('content')
    <div class="page">
        @include('back.includes.menu')

        <div class="content">
            <div class="col-md-2 offset-md-5">
                <button class="btn btn-primary mb-2" id="add">{{ __('static.elave_et') }}</button>
                <a href="{{ route('product.index') }}" class="btn btn-danger mb-2">Bütün</a>
            </div>
            <div class="col-md-8 offset-2">
                <select name="sub_menu_2" id="sub_menu_2" class="form-control">
                    <option value="">Birini seçin</option>
                    @foreach($sub_2_menus as $sub_menu_2)
                        <option value="{{ $sub_menu_2->sub_two_menu_id  }}">{{ $sub_menu_2->{'name_'.app()->getLocale()} }}</option>
                    @endforeach
                </select>
            </div>
            <!--PRODUCT BANNER SECTION========================-->
            <section class="product_banner fix">
                <div class="col-lg-8 col-md-12">
                    <div class="product_banner__gallery ">
                        <div class="col-xl-2 col-lg-12 col-md-12">
                            <h4 class="first wow animate__animated animate__fadeInLeft animate__fast">
                                <span id="capri">Capri</span>
                                <input type="text" value="" id="capriInput" style="width: 128px;display: none">
                            </h4>
                        </div>
                        <div class="col-xl-10 col-lg-12 col-md-12 bannertext_p">
                            <p class="wow animate__animated animate__fadeInDown animate__fast">
                                <span id="agt">AGT MDF-Lam Serilerinin favori dekorlarını sunan Dreamlam ile her mekanda trend tasarımlar yaratın!</span>
                                <textarea name="" id="agtInput" rows="2" style="width: 100%;display: none"></textarea>
                            </p>
                            <h6 class="wow animate__animated animate__fadeInDown animate__fast"><span>Brend: </span>
                            <span id="brend">AGT</span>
                                <input type="text" value="" id="brendInput" style="width: 50px;display: none">
                            </h6>
                        </div>
                        <div class="imag wow animate__animated animate__fadeInLeft animate__fast">
                            <img src="{{ asset('scalis') }}/img/products/details/detail/2.png" alt="" id="center_image">
                            <form action="{{ route('product.store') }}" enctype="multipart/form-data" id="center_image-form" onsubmit="return false" method="POST">
                                <input type="file" name="center_image" id="center_image_file" style="display: none">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 bannerBottom">
                    <div class="banner-video wow animate__animated animate__fadeInRight animate__fast">
                        <div class="video-slider">
                            <a class="lightbox-image"
                               data-fancybox="gallery"
                               data-caption="" autoplay muted loop href="{{ asset('scalis') }}//video/video.mp4">
                                <i class="ripple"></i>
                            </a>
                        </div>

                        <video src="{{ asset('scalis') }}/video/home-video.mp4"  muted loop type="video/mp4" id="right_side_video"></video>
                        <form action="{{ route('product.store') }}" enctype="multipart/form-data" id="right_side_video-form" onsubmit="return false" method="POST">
                            <input type="file" name="right_side_video" id="right_side_video_file" style="display: none">
                        </form>
                        <img src="{{ asset('scalis') }}/img/products/details/detail/3.png" alt="" id="right_side_image_1">
                        <form action="{{ route('product.store') }}" enctype="multipart/form-data" id="right_side_image_1-form" onsubmit="return false" method="POST">
                            <input type="file" name="right_side_image_1" id="right_side_image_1_file" style="display: none">
                        </form>
                    </div>


                </div>
            </section>
            <!--PRODUCT BANNER SECTION========================-->
            <!--PRODUCT SECTION========================-->
            <section class="product_section fix">
                <div class="technical-wrapper safe-area">
                    <h2 class="wow animate__animated animate__fadeInLeft animate__fast">Texniki özəlliklər</h2>
                    <div class="technical-container">
                        <div class="technical-info-block wow animate__animated animate__fadeInLeft animate__fast" style="background-color: #232e3c !important;">
                            <div class="info-item">
                                <span class="name">Yüzey</span>
                                <div class="desc-item">
                                    <p>
                                        <span id="seth">Mat Lake Hissi</span>
                                        <span><input type="text" id="sethInput" style="display: none"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="name">Renkler:</span>
                                <div class="desc-item">
                                    <p>
                                        <span id="reng">20</span>
                                        <span><input type="text" id="rengInput" style="display: none"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="name">Ebat:</span>
                                <div class="desc-item">
                                    <div class="size-info-block">
                                        <div class="size-item">
                                            <span>En:</span>
                                            <p><span id="en">1220</span><span><input type="text" id="enInput" style="width:50px;display: none"></span> mm </p>
                                        </div>
                                        <div class="size-item">
                                            <span>Boy:</span>
                                            <p><span id="boy">1220</span> <span><input type="text" id="boyInput" style="width:50px;display: none"></span> mm</p>
                                        </div>
                                        <div class="size-item">
                                            <span>Kalınlık (mm):</span>
                                            <p><span id="qalinliq">1220</span> <span><input type="text" id="qalinliqInput" style="width:50px;display: none"></span> mm</p>
                                        </div>
                                        <div class="size-item">
                                            <span>Palet:</span>
                                            <p><span id="palet">1220</span> <span><input type="text" id="paletInput" style="width:50px;display: none"></span> adet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="technical-img-block ">
                            <div class="img-item">
                                <div class="lazyload-wrapper">
                                    <img src="{{ asset('scalis') }}/img/products/details/detail/1.png" alt="" id="right_side_image_2">
                                    <form action="{{ route('product.store') }}" enctype="multipart/form-data" id="right_side_image_2-form" onsubmit="return false" method="POST">
                                        <input type="file" name="right_side_image_2" id="right_side_image_2_file" style="display: none">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--PRODUCT SECTION========================-->

            <section class="product-double-root metro fix">
                <div class="double-wrapper safe-area">
                    <div class="content-container certificate">
                        <h2 class="wow animate__animated animate__fadeInLeft animate__fast">Sertifikatlar <button class="btn btn-md btn-primary"><i class="fas fa-arrow-up"></i></button></h2>
                        <div class="content-block inside-slide-block wow animate__animated animate__fadeInUp animate__fast">
                            <div class="certificate-list-block " id="doubleCarousel">
                                <a href="#" class="swiper-slide">
                                    <div class="certificate-list-block certificate-list-item">
                                        <div class="certificate" style="background-color: #232e3c !important;">
                                            <div class="img-item">
                                                <div class="lazyload-wrapper">
                                                    <img src="img/products/details/detail/certf.png" alt="">
                                                </div>
                                            </div>
                                            <p>eo</p>
                                            <span>2022</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"  class="swiper-slide">
                                    <div class="certificate-list-block certificate-list-item">
                                        <div class="certificate" style="background-color: #232e3c !important;">
                                            <div class="img-item">
                                                <div class="lazyload-wrapper">
                                                    <img src="img/products/details/detail/certf.png" alt="">
                                                </div>
                                            </div>
                                            <p>eo</p>
                                            <span>2022</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"  class="swiper-slide">
                                    <div class="certificate-list-block certificate-list-item">
                                        <div class="certificate" style="background-color: #232e3c !important;">
                                            <div class="img-item">
                                                <div class="lazyload-wrapper">
                                                    <img src="img/products/details/detail/certf.png" alt="">
                                                </div>
                                            </div>
                                            <p>eo</p>
                                            <span>2022</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"  class="swiper-slide">
                                    <div class="certificate-list-block certificate-list-item">
                                        <div class="certificate" style="background-color: #232e3c !important;">
                                            <div class="img-item">
                                                <div class="lazyload-wrapper">
                                                    <img src="img/products/details/detail/certf.png" alt="">
                                                </div>
                                            </div>
                                            <p>eo</p>
                                            <span>2022</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"  class="swiper-slide">
                                    <div class="certificate-list-block certificate-list-item">
                                        <div class="certificate" style="background-color: #232e3c !important;">
                                            <div class="img-item">
                                                <div class="lazyload-wrapper">
                                                    <img src="img/products/details/detail/certf.png" alt="">
                                                </div>
                                            </div>
                                            <p>eo</p>
                                            <span>2022</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#"  class="swiper-slide">
                                    <div class="certificate-list-block certificate-list-item">
                                        <div class="certificate" style="background-color: #232e3c !important;">
                                            <div class="img-item">
                                                <div class="lazyload-wrapper">
                                                    <img src="img/products/details/detail/certf.png" alt="">
                                                </div>
                                            </div>
                                            <p>eo</p>
                                            <span>2022</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="nav-body">
                        <div class="nav-container">
                            <div class="nav-block">
                                <div class="arrow-icon left">

                                </div>
                                <!-- <span class="active"></span>
                                <span></span>
                                <span></span> -->
                                <div class="arrow-icon">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="content-container-f" style="background-color: #232e3c;">
                        <h2 class="wow animate__animated animate__fadeInLeft animate__fast">Dosyalar <button class="btn btn-md btn-primary"><i class="fas fa-arrow-up"></i></button></h2>
                        <div class="content-block wow animate__animated animate__fadeInLeft animate__fast">
                            <a href="https://cdn.agt.com.tr/assets/files/uvXHQoIwrO1628239043310.pdf" target="_blank" class="file-item">
                                <div class="pdf-item">
                                    <span>pdf</span>
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="text-item">
                                    <p>Supramat Katalog</p>
                                    <span>7.7 MB</span>
                                </div>
                            </a>
                            <a href="https://cdn.agt.com.tr/assets/files/pfuPzvUiEa1631542178825.pdf" target="_blank" class="file-item">
                                <div class="pdf-item">
                                    <span>pdf</span>
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="text-item">
                                    <p>Supramat Katalog</p>
                                    <span>7.7 MB</span>
                                </div>
                            </a>
                            <a href="" target="_blank" class="file-item">
                                <div class="pdf-item">
                                    <span>pdf</span>
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="text-item">
                                    <p>Supramat Katalog</p>
                                    <span>7.7 MB</span>
                                </div>
                            </a>
                            <a href="#" target="_blank" class="file-item">
                                <div class="pdf-item">
                                    <span>pdf</span>
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                                <div class="text-item">
                                    <p>Supramat Katalog</p>
                                    <span>7.7 MB</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>




            </section>
        </div>
        @include('back.includes.footer')
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sub_menu_2').select2();
        });
    </script>
    <script src="{{ asset('back/js/product-details.js') }}"></script>

    <script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/owl.carousel.js"></script>

    <script type="text/javascript"  src="{{ asset('scalis') }}/js/script.js"></script>
@endsection
