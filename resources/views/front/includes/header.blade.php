<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <link rel="stylesheet icon" href="{{ asset('scalis/img/foricon.ico') }}">
    <link rel="stylesheet" href="{{ asset('scalis/css/main.css') }}">
    @toastr_css
    @yield('css')
</head>
<body>
<!--PRELOADER SECTION========================-->
<div class="preload">
    <div class="loader">
        <div class="inner one"></div>
        <div class="inner two"></div>
        <div class="inner three"></div>
    </div>
</div>
<!--PRELOADER SECTION========================-->
<!--HEADER SECTION========================-->
<header class="header tw-head fixedTop ">
    <div class="header-up">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <ul class="socials">
                        <li><a href="{{ \App\Helpers\Options::getOption('facebook') }}"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="{{ \App\Helpers\Options::getOption('instagram') }}"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ \App\Helpers\Options::getOption('youtube') }}"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 lang">
                    <ul class="languages">
                        <li><a href="{{ route('lang.swithcher',['locale'=>'az']) }}">Az</a></li>
                        <li><a href="{{ route('lang.swithcher',['locale'=>'ru']) }}">Ru</a></li>
                        <li><a href="{{ route('lang.swithcher',['locale'=>'en']) }}">En</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @php
        $product_sub_menus = \App\Models\MainMenu::all()
    @endphp
    <div class="header-down ">
        <div class="container-fluid">
            <nav class="header_nav">
                <div class="header-left">
                    <ul class="header-menu">
                        <li><a href="{{ route('front.home') }}">{{ __('menus.home') }}</a></li>
                        <li><a href="{{ route('front.about') }}">{{ __('menus.about') }}</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">{{ __('menus.products') }}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($product_sub_menus as $product_sub_menu)
                                <li><a class="dropdown-item" href="{{ route('front.products.main_menu',['main_menu'=>$product_sub_menu->{'slug_'.app()->getLocale()}]) }}"><span class="menu-text">{{ $product_sub_menu->{'name_'.app()->getLocale()} }}</span></a></li>
                            @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('front.home') }}" class="header_logo">
                    <img src="{{ asset('scalis') }}/img/home/logo.png" alt="">
                </a>
                <div class="header-right">
                    <ul class="header-menu">
                        <li><a href="{{ route('front.brends') }}">{{ __('menus.brends') }}</a></li>
                        <li><a href="{{ route('front.career') }}">{{ __('menus.career') }}</a></li>
                        <li><a href="{{ route('front.contact') }}">{{ __('menus.contact') }}</a></li>
                    </ul>
                </div>
                <div class="mobileMenu">
                    <button class="navbar-toggler">
                        <span></span>
                    </button>
                </div>
            </nav>
            <div class="header-right-side non">
                <div class="header-menu">
                    <nav>
                        <ul>
                            <li class="menu-item-has-children current-item">
                                <a href="{{ route('front.home') }}">{{ __('menus.home') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('front.about') }}">{{ __('menus.about') }}</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a>{{ __('menus.products') }}</a>
                                <ul>
                                    @foreach($product_sub_menus as $product_sub_menu)
                                        <li><a href="{{ route('front.products.main_menu',['main_menu'=>$product_sub_menu->{'slug_'.app()->getLocale()}]) }}">{{ $product_sub_menu->{'name_'.app()->getLocale()} }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="brends.html">{{ __('menus.brends') }}</a>
                            </li>
                            <li>
                                <a href="career.html">{{ __('menus.career') }}</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.html">{{ __('menus.contact') }}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--HEADER SECTION========================-->
