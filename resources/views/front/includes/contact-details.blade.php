<!--CHOOSE SECTION========================-->
<section class="choose_area clearfix fix">
    <div class="choose_container container-fluid">
        <div class="row">
            <div class="choose_left wow animate__animated animate__fadeInLeft animate__fast"  style="background: url('{{ \App\Helpers\Options::getOption('upload_left_side_image_subscribe') == '' ?  asset('scalis/img/contact/c.png') : asset('files/about/'.\App\Helpers\Options::getOption('upload_left_side_image_subscribe')) }}'); ">

            </div>
            <div class="choose_right wow animate__animated animate__fadeInRight animate__fast">
                <div class="content">
                    <h2>{{ __('menus.contact') }}</h2>
                    <div class="widget-information">
                        <ul>
                            <li>
                                <span class="item"><i class="fas fa-map-marker-alt"></i></span>
                                @php
                                    if (\App\Helpers\Options::getOption('unvan') != '' && isset(explode('***',\App\Helpers\Options::getOption('unvan'))[0]) && app()->getLocale() == 'az')
                                    {
                                        $unvan = explode('***',\App\Helpers\Options::getOption('unvan'))[0];
                                    }
                                    elseif (\App\Helpers\Options::getOption('unvan') != '' && isset(explode('***',\App\Helpers\Options::getOption('unvan'))[1]) && app()->getLocale() == 'en')
                                    {
                                        $unvan = explode('***',\App\Helpers\Options::getOption('unvan'))[1];
                                    }
                                    elseif (\App\Helpers\Options::getOption('unvan') != '' && isset(explode('***',\App\Helpers\Options::getOption('unvan'))[2]) && app()->getLocale() == 'ru')
                                    {
                                        $unvan = explode('***',\App\Helpers\Options::getOption('unvan'))[2];
                                    }
                                    else
                                    {
                                        $unvan = '';
                                    }
                                @endphp
                                <span class="texts">{{ $unvan }}</span>
                                </span>
                            </li>
                            <li>
                                <span class="item"><i class="fas fa-phone"></i></span>
                                @php
                                    if (\App\Helpers\Options::getOption('tel') != '' && isset(explode('***',\App\Helpers\Options::getOption('tel'))[0]) && isset(explode('***',\App\Helpers\Options::getOption('tel'))[1]))
                                    {
                                        $telshow = explode('***',\App\Helpers\Options::getOption('tel'))[0];
                                        $telreal = explode('***',\App\Helpers\Options::getOption('tel'))[1];
                                    }
                                    else{
                                        $telshow = '';
                                        $telreal = '';
                                    }
                                @endphp
                                <span class="texts"><a href="tel:{{ $telreal }}">{{ $telshow }}</a></span>
                            </li>
                            <li>
                                <span class="item"><i class="far fa-envelope"></i></span>
                                @php
                                    if (\App\Helpers\Options::getOption('email') != '')
                                    {
                                        $email = \App\Helpers\Options::getOption('email');
                                    }
                                    else
                                    {
                                        $email = '';
                                    }
                                @endphp
                                <span class="texts"><a href="mailto:{{ $email }}">{{ $email }}</a></span>
                            </li>
                        </ul>
                    </div>
                    <div class="bottom-choose">
                        <h2>{{ __('static.abune_ol') }}</h2>
                        <div class="bottom-flex">
                            <h6>{{ __('static.sizin_email') }}</h6>
                            <button type="button" id="subscibeBtn">
                                <a href="javascript: void (0)">
                                    <img src="{{ asset('scalis') }}/img/send-icon.png" alt="">
                                </a>
                            </button>
                        </div>
                        <input type="text" id="email">
                        <input type="hidden" name="site_key" id="site_key" value="{{ env('RECAPTCHAV3_SITEKEY') }}">
                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                        <p class="text-danger" id="email-error"></p>
                        <p>{{ __('static.yenilikler_haqqinda_melumat_almaq_ucun_abune_olun') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--CHOOSE SECTION========================-->
