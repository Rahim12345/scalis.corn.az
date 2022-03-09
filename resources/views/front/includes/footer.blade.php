<!--FOOTER SECTION========================-->
<footer class="footer fix">
    <div class="container-fluid">
        <div class="footer_center">
            <div class="imag">
                <img class="imag" src="{{ asset('scalis') }}/img/home/scalis-logo.png" alt="">
            </div>
            <div>
                <p>{{ __('static.butun_huquqlar_qorunur') }} © {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</footer>
<!--FOOTER SECTION========================-->
<!--UPDOWN SECTION========================-->
<div class="progress-bar fix" >
    <button class="back-to-top hidden wow animate__animated animate__bounceInDown animate__fast">
        <svg xmlns="http://www.w3.org/2000/svg" class="back-to-top-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
        </svg>
    </button>
</div>
<!--UPDOWN SECTION========================-->
<!--SCRIPTS SECTION========================-->
<script type="text/javascript"  src="{{ asset('jquery.min.js') }}"></script>
{{--<script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/jquery-3.3.1.slim.min.js" ></script>--}}
<script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/popper.min.js" ></script>
<script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/bootstrap.min.js"></script>
<script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/jquery.bxslider.js"></script>
<script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/owl.carousel.js"></script>
<script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/pace.min.js"></script>
<script type="text/javascript"  src="{{ asset('scalis') }}/js/plugins/wow.js"></script>
<script type="text/javascript"  src="{{ asset('scalis') }}/js/category.js"></script>
<script type="text/javascript"  src="{{ asset('scalis') }}/js/script.js"></script>
@toastr_js
@toastr_render

<script async src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHAV3_SITEKEY') }}"></script>
<script type="text/javascript"  src="{{ asset('front/js/subscribe.js') }}"></script>
@yield('js')
</body>
</html>
